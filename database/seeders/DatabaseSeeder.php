<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         User::factory()->create([
            'name' => 'mario Subuyuc',
            'email' => 'mariosubuyucfb@gmail.com',
            'password' => Hash::make('12345678'),
        ]);


        $this->call([
        UserSeeder::class,
        VisitorSeeder::class,
        BookSeeder::class,
        MaterialSeeder::class,
        EventSeeder::class
    ]);
    }
}
