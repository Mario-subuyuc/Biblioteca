<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('admin.materiales.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.materiales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'donation' => 'required|boolean',
            'category' => 'nullable|string|max:100',
            'unit' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $material = new Material();
        $material->name = $request->name;
        $material->quantity = $request->quantity;
        $material->donation = $request->donation;
        $material->category = $request->category;
        $material->unit = $request->unit;
        $material->description = $request->description;
        $material->save();

        return redirect()->route('admin.materiales.index')
            ->with(['mensaje' => 'Material registrado correctamente', 'icono' => 'success']);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'donation' => 'required|boolean',
            'category' => 'nullable|string|max:100',
            'unit' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $material = Material::findOrFail($id);
        $material->name = $request->name;
        $material->quantity = $request->quantity;
        $material->donation = $request->donation;
        $material->category = $request->category;
        $material->unit = $request->unit;
        $material->description = $request->description;
        $material->save();

        return redirect()->route('admin.materiales.index')
            ->with(['mensaje' => 'Material actualizado correctamente', 'icono' => 'success']);
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
            ->with(['mensaje' => 'Material eliminado correctamente', 'icono' => 'success']);
    }
}
