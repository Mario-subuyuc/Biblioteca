<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Directive;
use App\Models\Reader;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //datos de pruebas de modulos
        /* $this->call([
        UserSeeder::class,
        VisitorSeeder::class,
        BookSeeder::class,
        MaterialSeeder::class,
        EventSeeder::class,
        ReservationSeeder::class,
        LoanSeeder::class,
    ]);*/

    // Crear roles si no existen
        $directorRole = Role::firstOrCreate(['name' => 'director']);
        $lectorRole   = Role::firstOrCreate(['name' => 'lector']);

        /*
        |--------------------------------------------------------------------------
        | DIRECTOR
        |--------------------------------------------------------------------------
        */
        $directorUser = User::create([
            'name'     => 'Mario Subuyuc',
            'email'    => 'mariosubuyucfb@gmail.com',
            'phone'    => '555-111-222',
            'address'  => 'Edificio Central',
            'gender'   => 'Masculino',
            'password' => Hash::make('12345678'),
        ]);

        // Asignar rol de Spatie
        $directorUser->assignRole($directorRole);

        // Crear registro en la tabla directives
        Directive::create([
            'user_id'    => $directorUser->id,
            'department' => 'Administración',
            'hours'      => 1,
        ]);

        /*
        |--------------------------------------------------------------------------
        | LECTOR
        |--------------------------------------------------------------------------
        */
        $lectorUser = User::create([
            'name'     => 'Juan Pérez',
            'email'    => 'juanperez@biblioteca.com',
            'phone'    => '555-333-444',
            'address'  => 'Zona 1, Ciudad',
            'gender'   => 'Masculino',
            'password' => Hash::make('12345678'),
        ]);

        $lectorUser->assignRole($lectorRole);

        Reader::create([
            'user_id'    => $lectorUser->id,
            'birth_date' => '2000-05-10',
            'dpi'        => '1234567890101',
            'occupation' => 'Estudiante',
            'ethnicity'  => 'Mestizo',
        ]);


        // Ruta para admin/usuarios
        Permission::Create(['name' => 'admin.usuarios.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.update'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.confirmDelete'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.destroy'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.usuarios.enable'])->syncRoles($directorRole);
        // Ruta para admin/lectores
        Permission::Create(['name' => 'admin.lectores.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.lectores.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.lectores.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.lectores.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.lectores.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.lectores.update'])->syncRoles($directorRole);
        // Ruta para admin/directores
        Permission::Create(['name' => 'admin.directores.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.directores.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.directores.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.directores.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.directores.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.directores.update'])->syncRoles($directorRole);
        // Ruta para admin/visitantes
        Permission::Create(['name' => 'admin.visitantes.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.update'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.confirmDelete'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.visitantes.destroy'])->syncRoles($directorRole);
        // Ruta para admin/donaciones
        Permission::Create(['name' => 'admin.donaciones.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.update'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.confirmDelete'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.donaciones.destroy'])->syncRoles($directorRole);
        // Ruta para admin/libros
        Permission::Create(['name' => 'admin.libros.index'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.create'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.store'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.show'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.edit'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.update'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.confirmDelete'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.destroy'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.libros.enable'])->syncRoles($directorRole,$lectorRole);
        // Ruta para admin/materiales
        Permission::Create(['name' => 'admin.materiales.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.update'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.confirmDelete'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.materiales.destroy'])->syncRoles($directorRole);
        // Ruta para admin/reservas
        Permission::Create(['name' => 'admin.reservaciones.index'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.reservas.store'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.reservas.cancel'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.reservas.updateState'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.reservas.update'])->syncRoles($directorRole,$lectorRole);
        // Ruta para admin/prestamos
        Permission::Create(['name' => 'admin.prestamos.index'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.prestamos.store'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.prestamos.cancel'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.prestamos.updateState'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.prestamos.update'])->syncRoles($directorRole,$lectorRole);
         // Ruta para admin/multas
        Permission::Create(['name' => 'admin.multas.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.multas.updateState'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.multas.generar'])->syncRoles($directorRole);
         // Ruta para admin/computadoras
        Permission::Create(['name' => 'admin.computadoras.index'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.create'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.store'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.show'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.edit'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.update'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.confirmDelete'])->syncRoles($directorRole);
        Permission::Create(['name' => 'admin.computadoras.destroy'])->syncRoles($directorRole);
        // Ruta para admin/Eventos
        Permission::Create(['name' => 'admin.Eventos.index'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.events.store'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.events.update'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'admin.events.destroy'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'events.assignUser'])->syncRoles($directorRole,$lectorRole);
        Permission::Create(['name' => 'events.removeUser'])->syncRoles($directorRole,$lectorRole);
        //ruta para reportes
        Permission::Create(['name' => 'admin.reportes.index'])->syncRoles($directorRole);
         //ruta para recomendaciones
        Permission::Create(['name' => 'admin.recomendaciones.index'])->syncRoles($directorRole,$lectorRole);

    }
}
