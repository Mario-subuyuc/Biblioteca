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
        $users = User::all();

        $events = [
            [
                'title' => 'Feria del Libro Universitario',
                'description' => 'Evento anual para promover la lectura y el intercambio de obras literarias.',
                'start' => now()->subDays(5)->setTime(9, 0),
                'end' => now()->subDays(5)->setTime(17, 0),
                'color' => '#007bff',
            ],
            [
                'title' => 'Taller de Escritura Creativa',
                'description' => 'Sesión interactiva para desarrollar habilidades narrativas y poéticas.',
                'start' => now()->addDays(3)->setTime(14, 0),
                'end' => now()->addDays(3)->setTime(17, 0),
                'color' => '#28a745',
            ],
            [
                'title' => 'Charla: El Futuro de la Inteligencia Artificial',
                'description' => 'Conferencia impartida por expertos en IA aplicada a la educación y la bibliotecología.',
                'start' => now()->addDays(10)->setTime(10, 0),
                'end' => now()->addDays(10)->setTime(12, 0),
                'color' => '#ffc107',
            ],
            [
                'title' => 'Concurso de Poesía Estudiantil',
                'description' => 'Competencia literaria abierta para estudiantes de todas las carreras.',
                'start' => now()->addDays(15)->setTime(9, 0),
                'end' => now()->addDays(15)->setTime(15, 0),
                'color' => '#dc3545',
            ],
            [
                'title' => 'Cine Foro: Clásicos del Realismo Mágico',
                'description' => 'Proyección y análisis de películas inspiradas en obras latinoamericanas.',
                'start' => now()->addDays(20)->setTime(18, 0),
                'end' => now()->addDays(20)->setTime(21, 0),
                'color' => '#6f42c1',
            ],
        ];

        foreach ($events as $data) {
            $event = Event::create($data);

            // Asignar entre 2 y 5 usuarios aleatorios al evento
            $event->users()->syncWithoutDetaching(
                $users->random(rand(2, 5))->pluck('id')->toArray()
            );
        }
    }
}
