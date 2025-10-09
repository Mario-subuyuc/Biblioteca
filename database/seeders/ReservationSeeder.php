<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\Reader;
use App\Models\Book;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $readers = Reader::all();
        $books = Book::withTrashed()->get(); // permitimos libros soft-deleted

        if ($readers->isEmpty() || $books->isEmpty()) {
            $this->command->info('ReservationSeeder: no hay readers o books. Ejecuta primero UserSeeder / BookSeeder.');
            return;
        }

        $faker = \Faker\Factory::create();

        $created = 0;

        // Intentamos crear hasta 60 reservas (algunas pueden saltarse si hay conflicto)
        for ($i = 0; $i < 60; $i++) {
            $reader = $readers->random();
            $book = $books->random();

            // Generar fecha y estado realista
            $r = rand(0, 99);
            if ($r < 50) { // reserva activa en futuro
                $reservationDate = Carbon::now()->addDays(rand(1, 30))->format('Y-m-d');
                $status = 'pendiente';
            } elseif ($r < 80) { // reserva cumplida (pasada)
                $reservationDate = Carbon::now()->subDays(rand(1, 90))->format('Y-m-d');
                $status = 'confirmada';
            } else { // cancelada
                $reservationDate = Carbon::now()->subDays(rand(1, 60))->format('Y-m-d');
                $status = 'cancelada';
            }

            // Evitar duplicados: no crear 2 reservas activas para el mismo libro en la misma fecha
            $exists = Reservation::where('book_id', $book->id)
                        ->where('date', $reservationDate)
                        ->where('state', 'active')
                        ->exists();

            if ($exists) {
                continue;
            }

            // Insertar
            Reservation::create([
                'reader_id' => $reader->id,
                'book_id' => $book->id,
                'date' => $reservationDate,
                'state' => $status,
            ]);

            $created++;
        }

        $this->command->info("ReservationSeeder: se crearon {$created} reservas.");
    }
}
