<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\Reader;
use App\Models\Book;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $readers = Reader::all();
        $books = Book::withTrashed()->get();

        if ($readers->isEmpty() || $books->isEmpty()) {
            $this->command->warn('LoanSeeder: No hay lectores o libros disponibles.');
            return;
        }

        $faker = \Faker\Factory::create();
        $count = 0;

        for ($i = 0; $i < 50; $i++) {
            $reader = $readers->random();
            $book = $books->random();

            $loanDate = Carbon::now()->subDays(rand(1, 60));
            $returnDate = (clone $loanDate)->addDays(rand(7, 21));

            // Determinar estado
            if ($returnDate->lt(Carbon::now()->subDays(rand(1, 10)))) {
                $status = 'devuelto';
            } elseif ($returnDate->lt(Carbon::now())) {
                $status = 'atrasado';
            } else {
                $status = 'activo';
            }

            // Evitar préstamo duplicado del mismo libro sin devolución
            $exists = Loan::where('book_id', $book->id)
                        ->whereIn('status', ['activo', 'atrasado'])
                        ->exists();

            if ($exists) continue;

            Loan::create([
                'reader_id'   => $reader->id,
                'book_id'     => $book->id,
                'loan_date'   => $loanDate->format('Y-m-d'),
                'return_date' => $returnDate->format('Y-m-d'),
                'status'      => $status,
            ]);

            $count++;
        }

        $this->command->info("LoanSeeder: se crearon {$count} préstamos simulados.");

    }
}
