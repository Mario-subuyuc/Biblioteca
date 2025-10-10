<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\User;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computadoras = Computer::all();
        return view('admin.computadoras.index', compact('computadoras'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $usuarios = User::all();
        return view('admin.computadoras.create', compact('usuarios'));
    }

    // Guardar un nuevo visitante
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'nullable|string|max:255',
            'gender'          => 'required|in:masculino,femenino,otro',
            'birth_date'      => 'required|date',
            'internet_access' => 'required|boolean',
            'usage_purpose'   => 'required|string|max:255',
            'user_id'         => 'nullable|exists:users,id',
        ]);

        Computer::create($request->all());

        return redirect()->route('admin.computadoras.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Computadora registrada correctamente');
    }


    // Mostrar un visitante específico
    public function show($id)
    {
        $computadora = Computer::findOrFail($id);
        return view('admin.computadoras.show', compact('computadora'));
    }

    // Formulario para editar visitante
    public function edit($id)
    {
        $computadora = Computer::findOrFail($id);
        $usuarios = User::all(); // para el select de usuario asociado
        return view('admin.computadoras.edit', compact('computadora', 'usuarios'));
    }

    // Actualizar visitante
    // Actualizar computadora
    public function update(Request $request, $id)
    {
        $computadora = Computer::findOrFail($id);

        $request->validate([
            'name'            => 'nullable|string|max:255',
            'gender'          => 'required|in:masculino,femenino,otro',
            'birth_date'      => 'required|date',
            'internet_access' => 'required|boolean',
            'usage_purpose'   => 'required|string|max:255',
            'user_id'         => 'nullable|exists:users,id',
        ]);

        $computadora->update($request->only([
            'name',
            'gender',
            'birth_date',
            'internet_access',
            'usage_purpose',
            'user_id',
        ]));

        return redirect()->route('admin.computadoras.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Computadora actualizada correctamente');
    }

    public function confirmDelete($id)
    {
        $computadora = Computer::findOrFail($id);
        return view('admin.computadoras.delete', compact('computadora'));
    }

    /**
     * Eliminar usuario de la base de datos.
     */
    public function destroy($id)
    {
        $computadora = Computer::findOrFail($id);
        $computadora->delete();

        return redirect()->route('admin.computadoras.index')
            ->with('mensaje', 'Se eliminó la computadora correctamente.')
            ->with('icono', 'success');
    }
}
