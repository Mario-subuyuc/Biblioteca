<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('admin.materiales.index', compact('materiales'));
    }

    public function create()
    {
        return view('admin.materiales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'quantity'    => 'required|integer|min:1',
            'donation'    => 'required|string|max:10',
            'category'    => 'nullable|string|max:255',
            'unit'        => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
        ]);

        Material::create($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Material registrado correctamente');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materiales.show', compact('material'));
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materiales.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'quantity'    => 'required|integer|min:1',
            'donation'    => 'required|string|max:10',
            'category'    => 'nullable|string|max:255',
            'unit'        => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
        ]);

        $material->update($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Material actualizado correctamente');
    }

    public function confirmDelete($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materiales.delete', compact('material'));
    }

    public function destroy($id)
    {
        Material::destroy($id);

        return redirect()->route('admin.materiales.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Material eliminado correctamente');
    }
}
