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
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.materiales.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            {{-- Código --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="code">Código del Material <b>*</b></label>
                                <input type="text" name="code" id="code"
                                    class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}"
                                    placeholder="Ej: TEJ0001" required>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nombre --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="name">Nombre del Material <b>*</b></label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Ej: Mesa para computadoras" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Descripción --}}
                        <div class="form-group mb-3">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" rows="3"
                                class="form-control @error('description') is-invalid @enderror" placeholder="Descripción del material">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            {{-- Ubicación --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="location">Ubicación</label>
                                <input type="text" name="location" id="location"
                                    class="form-control @error('location') is-invalid @enderror"
                                    value="{{ old('location') }}" placeholder="Ej: Rincón de Tecnología">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tipo de adquisición --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="acquisition_type">Tipo de adquisición</label>
                                <input type="text" name="acquisition_type" id="acquisition_type"
                                    class="form-control @error('acquisition_type') is-invalid @enderror"
                                    value="{{ old('acquisition_type') }}" placeholder="Ej: Compra, Donación">
                                @error('acquisition_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Responsable --}}
                            <div class="form-group col-md-6 mb-3">
                                <label for="responsible">Responsable</label>
                                <input type="text" name="responsible" id="responsible"
                                    class="form-control @error('responsible') is-invalid @enderror"
                                    value="{{ old('responsible') }}" placeholder="Nombre del responsable">
                                @error('responsible')
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
