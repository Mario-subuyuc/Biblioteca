<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                     => 'required|string|max:255',
            'email'                    => 'required|email|unique:users',
            'password'                 => 'required|min:8|confirmed',
            'phone'                    => 'nullable|string|max:20',
            'address'                   => 'nullable|string|max:255',
        ]);

        User::create([
            'name'                     => $request->name,
            'email'                    => $request->email,
            'password'                 => Hash::make($request->password),
            'phone'                    => $request->phone,
            'address'                   => $request->address,
        ]);

        return redirect()->route('admin.usuarios.index')
        ->with('icono', 'success')
        ->with('mensaje', 'Usuario creado correctamente');
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $usuario->id,
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $usuario->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => $request->password ? Hash::make($request->password) : $usuario->password,
        ]);

        return redirect()->route('admin.usuarios.index')
        ->with('icono', 'success')
        ->with('mensaje', 'Usuario actualizado correctamente');
    }

    public function confirmDelete($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

        public function destroy($id){
        $usuarioAutenticado = Auth::user();

    // Verificar si el usuario autenticado intenta eliminarse a sí mismo
    if ($usuarioAutenticado->id == $id) {
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'No puedes eliminar tu propia cuenta.')
            ->with('icono', 'error');
    }

        User::destroy($id);

        return redirect()->route(route:'admin.usuarios.index')
        ->with('mensaje','Se elimino al usuario correctamente')
        ->with('icono','success');
    }
}
