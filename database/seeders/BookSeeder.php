<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crear 50 libros de prueba
        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'title' => $faker->sentence(3), // título de 3 palabras
                'author' => $faker->name,
                'publisher' => $faker->company,
                'pages' => $faker->numberBetween(50, 1000),
                'dewey_classification' => $faker->numberBetween(000, 999) . '.' . $faker->numberBetween(0, 99),
                'edition' => $faker->numberBetween(1, 10) . 'th',
                'isbn' => $faker->unique()->isbn13,
                'published_year' => $faker->year,
                'total_copies' => $faker->numberBetween(1, 10),
                'available_copies' => $faker->numberBetween(0, 5),
            ]);
        }
    }
}
