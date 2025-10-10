<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(string $id)
    {
        $user = Auth::user();

        // Validar que el usuario autenticado solo edite su perfil
        if (Auth::id() != $id) {
            abort(403, 'Acceso no autorizado');
        }

        $user = User::findOrFail($id);

        // Contar las visitas asociadas al usuario logeado
        $visitas = Visitor::where('user_id', $user->id)->count();

        // Contar los libros prestados del usuario
        $librosPrestados = Loan::whereHas('reader', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();

        // Contar los libros atrasados del usuario
        $librosAtrasados = Loan::whereHas('reader', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->where('status', 'atrasado') // solo los que están atrasados
            ->count();

        $multas = 0; // aquí puedes agregar la lógica para contar multas si la tienes
        $eventos = $user->events()->count();

        return view('usuarios.edit', compact(
            'user',
            'visitas',
            'librosPrestados',
            'librosAtrasados',
            'multas',
            'eventos'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::id() != $id) {
            abort(403, 'Acceso no autorizado');
        }

        $user = User::findOrFail($id);

        // Validación
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id, // ignora el propio correo
            'password' => 'nullable|min:8|confirmed',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
        ]);

        // Actualización
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('dashboard')
            ->with('icono', 'success')
            ->with('mensaje', 'Perfil actualizado correctamente');
    }
}
