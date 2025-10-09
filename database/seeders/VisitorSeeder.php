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
        $users = User::all();

        // === Visitantes registrados (asociados a usuarios) ===
        foreach ($users->take(8) as $user) {
            Visitor::create([
                'name' => $user->name,
                'location' => 'Zona ' . rand(1, 12) . ', Ciudad',
                'birth_year' => rand(1965, 2005),
                'gender' => $user->gender,
                'ethnicity' => ['Mestizo', 'Indígena', 'Afrodescendiente', 'Otro'][rand(0, 3)],
                'occupation' => ['Estudiante', 'Profesor', 'Investigador', 'Empleado público'][rand(0, 3)],
                'visit_date' => now()->subDays(rand(0, 15))->format('Y-m-d'),
                'visit_time' => now()->subHours(rand(0, 8))->format('H:i:s'),
                'user_id' => $user->id,
            ]);
        }

        // === Visitantes no registrados (sin user_id) ===
        for ($i = 1; $i <= 7; $i++) {
            Visitor::create([
                'name' => "Visitante Anónimo $i",
                'location' => 'Aldea ' . ['Las Flores', 'El Carmen', 'San Pedro', 'La Esperanza'][rand(0, 3)],
                'birth_year' => rand(1970, 2010),
                'gender' => $i % 2 == 0 ? 'female' : 'male',
                'ethnicity' => ['Mestizo', 'Indígena', 'Afrodescendiente', 'Otro'][rand(0, 3)],
                'occupation' => ['Agricultor', 'Estudiante', 'Ama de casa', 'Comerciante'][rand(0, 3)],
                'visit_date' => now()->subDays(rand(0, 30))->format('Y-m-d'),
                'visit_time' => now()->subHours(rand(1, 12))->format('H:i:s'),
                'user_id' => null,
            ]);
        }

    }
}
