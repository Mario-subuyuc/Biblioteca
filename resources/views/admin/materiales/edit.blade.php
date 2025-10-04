@extends('layouts.admin')
@section('title', 'Editar Material')
@section('content')
    <div class="row">
        <h1>Editar Material: {{ $material->name }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Formulario de edición</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.materiales.update', $material->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            {{-- Código --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Código</label>
                                    <input type="text" name="code" value="{{ old('code', $material->code) }}"
                                        class="form-control @error('code') is-invalid @enderror" required>
                                    @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Nombre --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="name" value="{{ old('name', $material->name) }}"
                                        class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Ubicación --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ubicación</label>
                                    <input type="text" name="location" value="{{ old('location', $material->location) }}"
                                        class="form-control @error('location') is-invalid @enderror">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Descripción --}}
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $material->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            {{-- Tipo de adquisición --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de adquisición</label>
                                    <input type="text" name="acquisition_type"
                                        value="{{ old('acquisition_type', $material->acquisition_type) }}"
                                        class="form-control @error('acquisition_type') is-invalid @enderror">
                                    @error('acquisition_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Responsable --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Responsable</label>
                                    <input type="text" name="responsible"
                                        value="{{ old('responsible', $material->responsible) }}"
                                        class="form-control @error('responsible') is-invalid @enderror">
                                    @error('responsible')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Descarte o venta --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Descarte o venta</label>
                                    <select name="discard_or_sale"
                                        class="form-control @error('discard_or_sale') is-invalid @enderror">
                                        <option value="">Seleccione</option>
                                        <option value="Descarte"
                                            {{ old('discard_or_sale', $material->discard_or_sale) == 'Descarte' ? 'selected' : '' }}>
                                            Descarte</option>
                                        <option value="Venta"
                                            {{ old('discard_or_sale', $material->discard_or_sale) == 'Venta' ? 'selected' : '' }}>
                                            Venta</option>
                                    </select>
                                    @error('discard_or_sale')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Fecha de descarte o venta --}}
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de descarte/venta</label>
                                    <input type="date" name="discard_or_sale_date" id="discard_or_sale_date"
                                        value="{{ old('discard_or_sale_date', $material->discard_or_sale_date ? \Carbon\Carbon::parse($material->discard_or_sale_date)->format('Y-m-d') : '') }}"
                                        class="form-control @error('discard_or_sale_date') is-invalid @enderror">
                                    @error('discard_or_sale_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="no_date"
                                            onclick="document.getElementById('discard_or_sale_date').value='';">
                                        <label class="form-check-label" for="no_date">
                                            Sin fecha
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <a href="{{ route('admin.materiales.index') }}" class="btn btn-secondary">Volver a la
                                    lista</a>
                                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Actualizar
                                    Material</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
