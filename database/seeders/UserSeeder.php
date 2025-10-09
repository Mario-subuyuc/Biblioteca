<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reader;
use App\Models\Directive;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
     public function run(): void
    {
      // === Crear Directivos ===
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'name' => "Directivo $i",
                'email' => "directive$i@example.com",
                'password' => Hash::make('password123'),
                'phone' => '555-000' . $i,
                'address' => 'Edificio Central, Piso ' . $i,
                'gender' => $i % 2 == 0 ? 'femenino' : 'masculino',
            ]);

            Directive::create([
                'user_id' => $user->id,
                'department' => 'Departamento ' . ['Biblioteca', 'Finanzas', 'Sistemas'][rand(0, 2)],
                'hours' => rand(20, 40),
            ]);
        }

        // === Crear Lectores ===
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => "Lector $i",
                'email' => "reader$i@example.com",
                'password' => Hash::make('password123'),
                'phone' => '555-100' . $i,
                'address' => 'Zona ' . rand(1, 10) . ', Ciudad',
                'gender' => $i % 2 == 0 ? 'femenino' : 'masculino',
            ]);

            Reader::create([
                'user_id' => $user->id,
                'birth_date' => now()->subYears(rand(18, 60))->format('Y-m-d'),
                'dpi' => '1234' . rand(10000, 99999) . '0' . rand(10, 99),
                'occupation' => ['Estudiante', 'Profesor', 'Investigador', 'Bibliotecario'][rand(0, 3)],
                'ethnicity' => ['Mestizo', 'Indígena', 'Afrodescendiente', 'Otro'][rand(0, 3)],
            ]);
        }

        // === Crear un usuario administrador ===
        User::create([
            'name' => 'Administrador General',
            'email' => 'admin@biblioteca.com',
            'password' => Hash::make('admin123'),
            'phone' => '555-9999',
            'address' => 'Oficina Principal',
            'gender' => 'masculino',
        ]);
    }
}
