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
        $readers = User::whereHas('reader')->get();     // Usuarios con relación reader
        $directives = User::whereHas('directive')->get(); // Usuarios con relación directive

        return view('admin.donaciones.create', compact('readers', 'directives'));
    }

    // Guardar un nuevo visitante
    public function store(Request $request)
    {
        $request->validate([
            'reader_id'     => 'nullable|exists:users,id',
            'directive_id'  => 'required|exists:users,id',
            'amount'        => 'required|numeric|min:0.01',
            'method'        => 'required|string|max:50',
            'donation_date' => 'required|date',
            'note'          => 'nullable|string|max:500',
        ]);

        Donation::create($request->all());

        return redirect()->route('admin.donaciones.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Donación registrada correctamente');
    }

    // Mostrar un visitante específico
    public function show($id)
    {
        $donacion = Donation::with(['reader', 'directive'])->findOrFail($id);
        return view('admin.donaciones.show', compact('donacion'));
    }

    public function edit($id)
    {
        $donacion = Donation::findOrFail($id);

        // Usuarios con relación a reader (donantes)
        $readers = User::whereHas('reader')->get();

        // Usuarios con relación a directive (receptores)
        $directives = User::whereHas('directive')->get();

        return view('admin.donaciones.edit', compact('donacion', 'readers', 'directives'));
    }

    public function update(Request $request, $id)
    {
        $donacion = Donation::findOrFail($id);

        $request->validate([
            'reader_id'     => 'nullable|exists:users,id',
            'directive_id'  => 'required|exists:users,id',
            'amount'        => 'required|numeric|min:0.01',
            'method'        => 'required|string|max:50',
            'donation_date' => 'required|date',
            'note'          => 'nullable|string|max:500',
        ]);

        $donacion->update($request->only([
            'reader_id',
            'directive_id',
            'amount',
            'method',
            'donation_date',
            'note'
        ]));

        return redirect()->route('admin.donaciones.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Donación actualizada correctamente');
    }

    public function confirmDelete($id)
    {
        $donacion = Donation::with(['reader', 'directive'])->findOrFail($id);
        return view('admin.donaciones.delete', compact('donacion'));
    }

    /**
     * Eliminar usuario de la base de datos.
     */
    public function destroy($id)
    {
        $donacion = Donation::findOrFail($id);
        $donacion->delete();

        return redirect()->route('admin.donaciones.index')
            ->with('mensaje', 'La donación se eliminó correctamente.')
            ->with('icono', 'success');
    }
}
