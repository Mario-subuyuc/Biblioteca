<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visitor;
use App\Models\User;
use Faker\Factory as Faker;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::pluck('id')->toArray(); // IDs de usuarios

        foreach (range(1, 50) as $i) {
            Visitor::create([
                'name'       => $faker->name,
                'location'   => $faker->city,
                'birth_year' => $faker->numberBetween(1960, 2010),
                'gender'     => $faker->randomElement(['Masculino', 'Femenino', 'Otro']),
                'ethnicity'  => $faker->randomElement(['Mestizo', 'Indígena', 'Afrodescendiente', 'Otro']),
                'occupation' => $faker->jobTitle,
                'visit_date' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                'visit_time' => $faker->time('H:i:s'),
                'user_id'    => $faker->randomElement($users), // Relacionado con un usuario
            ]);
        }

    }
}
