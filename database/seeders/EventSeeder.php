<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $faker = Faker::create();

        $users = User::all();

        foreach (range(1, 20) as $i) {
            $startDateTime = $faker->dateTimeBetween('now', '+1 month');
            $endDateTime = (clone $startDateTime)->modify('+'.rand(1,3).' hours');

            $event = Event::create([
                'title'       => $faker->sentence(3),
                'description' => $faker->paragraph,
                'start'       => $startDateTime,
                'end'         => $endDateTime,
                'color'       => $faker->randomElement(['#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1']),
            ]);

            // Relacionar el evento con 1 a 3 usuarios aleatorios
            if ($users->count() > 0) {
                $event->users()->attach(
                    $users->random(rand(1, min(3, $users->count())))->pluck('id')->toArray()
                );
            }
        }
    }
}
