@extends('layouts.admin')
@section('title', 'Eliminar Material')
@section('content')
<div class="row">
    <h1>Eliminar Material: {{ $material->name }}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar este material?</h3>
            </div>
            <div class="card-body">
                {{-- Formulario para eliminar material --}}
                <form action="{{ route('admin.materiales.destroy', $material->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        {{-- Código --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Código</label>
                                <input type="text" value="{{ $material->code }}" class="form-control" readonly>
                            </div>
                        </div>

                        {{-- Nombre --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" value="{{ $material->name }}" class="form-control" readonly>
                            </div>
                        </div>

                        {{-- Ubicación --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <input type="text" value="{{ $material->location ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        {{-- Tipo de adquisición --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de adquisición</label>
                                <input type="text" value="{{ $material->acquisition_type ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>

                        {{-- Responsable --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Responsable</label>
                                <input type="text" value="{{ $material->responsible ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>

                        {{-- Descarte o venta --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Descarte o venta</label>
                                <input type="text" value="{{ $material->discard_or_sale ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    {{-- Descripción --}}
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" rows="3" readonly>{{ $material->description ?? '—' }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Fecha de descarte o venta --}}
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de descarte/venta</label>
                                <input type="text" value="{{ $material->discard_or_sale_date ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>

                        {{-- Creado y actualizado --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Creado en</label>
                                <input type="text" value="{{ $material->created_at->format('d/m/Y H:i') }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Última actualización</label>
                                <input type="text" value="{{ $material->updated_at->format('d/m/Y H:i') }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a href="{{ route('admin.materiales.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar Material</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
