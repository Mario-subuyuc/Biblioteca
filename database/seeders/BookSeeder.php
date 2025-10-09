<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Directive;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES'); // o 'en_US' según prefieras
        $directives = Directive::all();

        for ($i = 1; $i <= 2000; $i++) {
            $book = Book::create([
                'title'       => $faker->sentence(3), // título aleatorio de 3 palabras
                'author'      => $faker->name,
                'publisher'   => $faker->company,
                'dewey'       => $faker->randomFloat(3, 800, 899), // ejemplo: 813.542
                'isbn'        => $faker->isbn13,
                'ubication'   => 'Estante ' . chr(65 + rand(0, 5)) . '-' . rand(1, 20),
                'enabled_at'  => now()->subDays(rand(0, 30)),
                'enabled_by'  => $directives->random()->id ?? null,
            ]);

            // Simular libros deshabilitados
            if ($i % 4 === 0) {
                $book->update([
                    'disabled_at' => now()->subDays(rand(1, 10)),
                    'disabled_by' => $directives->random()->id ?? null,
                ]);
            }
        }
    }
}
