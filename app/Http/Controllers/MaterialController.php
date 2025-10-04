<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    //principal materiales
    public function index()
    {

        $materiales = Material::withTrashed()->get();
        return view('admin.materiales.index', compact('materiales'));
    }

    //crear material
    public function create()
    {
        return view('admin.materiales.create');
    }

    //guardar materiales
    public function store(Request $request)
    {
        $request->validate([
            'code'               => 'required|string|max:10|unique:materials,code',
            'name'               => 'required|string|max:255',
            'description'        => 'nullable|string|max:500',
            'location'           => 'nullable|string|max:100',
            'acquisition_type'   => 'nullable|string|max:100',
            'responsible'        => 'nullable|string|max:100',
            'discard_or_sale_date'  => 'nullable|date'
        ]);

        Material::create($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Material registrado correctamente');
    }

    //mostrar material
    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materiales.show', compact('material'));
    }

    //editar material
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materiales.edit', compact('material'));
    }

    //actualizar material
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'code'               => 'required|string|max:10|unique:materials,code,' . $material->id,
            'name'               => 'required|string|max:255',
            'description'        => 'nullable|string|max:500',
            'location'           => 'nullable|string|max:100',
            'acquisition_type'   => 'nullable|string|max:100',
            'responsible'        => 'nullable|string|max:100',
            'discard_or_sale'    => 'nullable|string|max:50',
            'discard_or_sale_date' => 'nullable|date',
        ]);

        $material->update($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Material actualizado correctamente');
    }

    //formulario de eliminacion
    public function confirmDelete($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materiales.delete', compact('material'));
    }

    //eliminicion de material
    public function destroy($id)
{
    $material = Material::findOrFail($id);
    $material->delete(); // Soft delete

    return redirect()->route('admin.materiales.index')
        ->with('icono', 'success')
        ->with('mensaje', 'Material deshabilitado correctamente');
}
}
