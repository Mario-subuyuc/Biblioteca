<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Reader;
use App\Models\User;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('admin.donaciones.index', compact('donations'));
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
}
