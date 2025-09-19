<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Validar que el usuario autenticado solo edite su perfil
        if (Auth::id() != $id) {
            abort(403, 'Acceso no autorizado');
        }

        $user = User::findOrFail($id);

        return view('usuarios.edit', compact('user'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
