<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use Faker\Factory as Faker;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Material::create([
                'name' => $faker->word() . ' ' . $faker->randomElement(['Silla', 'Mesa', 'Lápiz', 'Cuaderno', 'Estante']),
                'quantity' => $faker->numberBetween(1, 100),
                'donation' => $faker->boolean(30), // 30% probabilidad de ser donación
                'category' => $faker->randomElement(['Mobiliario', 'Insumos', 'Equipos']),
                'unit' => $faker->randomElement(['pieza', 'unidad', 'caja']),
                'description' => $faker->sentence(),
            ]);
        }
    }
}
