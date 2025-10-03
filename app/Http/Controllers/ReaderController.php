<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Models\User;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::whereHas('user')->with('user')->get();// Trae todos los registros
        return view('admin.lectores.index', compact('readers'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        // Trae solo usuarios que no tienen lector asociado
        $users = User::doesntHave('reader')->get();

        // Opciones de etnia
        $ethnicities = ['Maya', 'Ladina', 'Garífuna', 'Xinca', 'Otro'];

        return view('admin.lectores.create', compact('users', 'ethnicities'));
    }

    // Guardar nuevo lector
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:readers,user_id',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'dpi' => 'required|unique:readers,dpi',
            'occupation' => 'nullable|string|max:100',
            'ethnicity' => 'nullable|string|max:100',
        ], [
            'user_id.required' => 'Debes seleccionar un usuario.',
            'user_id.exists' => 'El usuario seleccionado no existe.',
            'user_id.unique' => 'El usuario ya tiene un lector asociado.',
            'birth_date.date' => 'La fecha de nacimiento no es válida.',
            'gender.in' => 'El género seleccionado no es válido.',
            'dpi.required' => 'El DPI es obligatorio.',
            'dpi.unique' => 'Este DPI ya está registrado.',
        ]);

        Reader::create($request->all());

        return redirect()->route('admin.lectores.index')
            ->with('success', 'Lector registrado correctamente.')
            ->with('icon', 'success');
    }

    public function show(Reader $reader)
    {
        return view('readers.show', compact('reader'));
    }

    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, Reader $reader)
    {
        $request->validate([
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'dpi' => 'required|unique:readers,dpi,' . $reader->id,
            'occupation' => 'nullable|string',
            'ethnicity' => 'nullable|string',
        ]);

        $reader->update($request->all());

        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    public function destroy(Reader $reader)
    {
        $reader->delete();
        return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
