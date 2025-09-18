<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\User;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // Mostrar todos los visitantes
    public function index()
    {
        $visitors = Visitor::with('user')->paginate(10);
        return view('visitors.index', compact('visitors'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $users = User::all(); // para asignar un usuario opcional
        return view('visitors.create', compact('users'));
    }

    // Guardar un nuevo visitante
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'birth_year' => 'nullable|digits:4|integer',
            'gender' => 'nullable|string|max:50',
            'ethnicity' => 'nullable|string|max:100',
            'occupation' => 'nullable|string|max:100',
            'visit_date' => 'required|date',
            'visit_time' => 'required',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Visitor::create($request->all());

        return redirect()->route('visitors.index')->with('success', 'Visitante creado correctamente.');
    }

    // Mostrar un visitante específico
    public function show(Visitor $visitor)
    {
        return view('visitors.show', compact('visitor'));
    }

    // Formulario para editar visitante
    public function edit(Visitor $visitor)
    {
        $users = User::all();
        return view('visitors.edit', compact('visitor', 'users'));
    }

    // Actualizar visitante
    public function update(Request $request, Visitor $visitor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'birth_year' => 'nullable|digits:4|integer',
            'gender' => 'nullable|string|max:50',
            'ethnicity' => 'nullable|string|max:100',
            'occupation' => 'nullable|string|max:100',
            'visit_date' => 'required|date',
            'visit_time' => 'required',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $visitor->update($request->all());

        return redirect()->route('visitors.index')->with('success', 'Visitante actualizado correctamente.');
    }

    // Eliminar visitante
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitante eliminado correctamente.');
    }
}
