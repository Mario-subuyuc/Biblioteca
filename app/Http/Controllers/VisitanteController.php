<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$visitantes = Visitante::latest()->paginate(10);
        return view('admin.visitantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visitantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_visita' => 'required|date',
        ]);

        Visitante::create($request->all());

        return redirect()->route('visitantes.index')
                         ->with('success', 'Visitante registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return view('visitantes.show', compact('visitante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          return view('visitantes.edit', compact('visitante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitante $visitante   )
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_visita' => 'required|date',
        ]);

        $visitante->update($request->all());

        return redirect()->route('visitantes.index')
                         ->with('success', 'Datos del visitante actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitante $visitante)
    {
        $visitante->delete();

        return redirect()->route('visitantes.index')
                         ->with('success', 'Visitante eliminado.');
    }
}
