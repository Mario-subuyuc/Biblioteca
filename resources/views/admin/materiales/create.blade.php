@extends('layouts.admin')

@section('title', 'Registrar Material')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1>Registrar Nuevo Material</h1>
        <p class="text-muted">Completa la información para agregar un nuevo material al inventario.</p>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Formulario de Registro</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.materiales.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Nombre --}}
                        <div class="form-group col-md-6 mb-3">
                            <label for="name">Nombre del Material <b>*</b></label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Ej: Fertilizante orgánico" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Cantidad --}}
                        <div class="form-group col-md-3 mb-3">
                            <label for="quantity">Cantidad <b>*</b></label>
                            <input type="number" name="quantity" id="quantity"
                                class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity') }}" min="1" placeholder="Ej: 50" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Unidad --}}
                        <div class="form-group col-md-3 mb-3">
                            <label for="unit">Unidad</label>
                            <input type="text" name="unit" id="unit"
                                class="form-control @error('unit') is-invalid @enderror"
                                value="{{ old('unit') }}" placeholder="Kg, Litros, Piezas">
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Donación --}}
                        <div class="form-group col-md-4 mb-3">
                            <label for="donation">Donación <b>*</b></label>
                            <select name="donation" id="donation"
                                class="form-control @error('donation') is-invalid @enderror" required>
                                <option value="">Seleccione</option>
                                <option value="Sí" {{ old('donation') == 'Sí' ? 'selected' : '' }}>Sí</option>
                                <option value="No" {{ old('donation') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('donation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categoría --}}
                        <div class="form-group col-md-8 mb-3">
                            <label for="category">Categoría</label>
                            <input type="text" name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror"
                                value="{{ old('category') }}" placeholder="Ej: Herramientas, Insumos, etc.">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Descripción --}}
                        <div class="form-group col-md-12 mb-3">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" rows="3"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Escriba una breve descripción...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.materiales.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Material
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
