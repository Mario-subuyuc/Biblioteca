<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    // Mostrar todos los visitantes
    public function index()
    {
        $visitantes = Visitor::all();
        return view('admin.visitantes.index', compact('visitantes'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $usuarios = User::all();
        return view('admin.visitantes.create', compact('usuarios'));
    }

    // Guardar un nuevo visitante
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'nullable|string|max:255',
            'birth_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'gender'     => 'nullable|string|max:50',
            'ethnicity'  => 'nullable|string|max:100',
            'occupation' => 'nullable|string|max:100',
            'visit_date' => 'required|date',
            'visit_time' => 'required',
            'user_id'    => 'nullable|exists:users,id',
        ]);

        Visitor::create($request->all());

        return redirect()->route('admin.visitantes.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Visitante registrado correctamente');
    }
    // Mostrar un visitante específico
    public function show($id)
    {
        $visitante = Visitor::findOrFail($id);
        return view('admin.visitantes.show', compact('visitante'));
    }

    // Formulario para editar visitante
    public function edit($id)
    {
        $visitante = Visitor::findOrFail($id);
        $usuarios = User::all(); // para el select de usuario asociado
        return view('admin.visitantes.edit', compact('visitante', 'usuarios'));
    }

    // Actualizar visitante
    public function update(Request $request, $id)
    {
         $visitor = Visitor::findOrFail($id);

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

        $visitor->update($request->only([
            'name',
            'location',
            'birth_year',
            'gender',
            'ethnicity',
            'occupation',
            'visit_date',
            'visit_time',
            'user_id',
        ]));

        return redirect()->route('admin.visitantes.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Visitante actualizado correctamente');
    }

    public function confirmDelete($id)
    {
        $visitante = Visitor::findOrFail($id);
        return view('admin.visitantes.delete', compact('visitante'));
    }

    /**
     * Eliminar usuario de la base de datos.
     */
    public function destroy($id)
    {
        // Buscar y eliminar usuario
        $visitante = Visitor::findOrFail($id);
        $visitante->delete();

        return redirect()->route('admin.visitantes.index')
            ->with('mensaje', 'Se eliminó al usuario correctamente.')
            ->with('icono', 'success');
    }
}
