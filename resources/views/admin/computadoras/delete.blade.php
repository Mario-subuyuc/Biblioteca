@extends('layouts.admin')
@section('title', 'Eliminar Computadora')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h1>Eliminar Computadora: {{ $computadora->name ?? "ID #{$computadora->id}" }}</h1>
        <p class="text-danger">
            ⚠️ ¡Atención! Esta acción es irreversible.
            Se eliminarán todos los registros relacionados con esta computadora.
        </p>
    </div>
</div>
<hr>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Detalles del registro</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.computadoras.destroy', $computadora->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        {{-- Nombre --}}
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" value="{{ $computadora->name ?? '—' }}" disabled>
                        </div>

                        {{-- Género --}}
                        <div class="col-md-6 mb-3">
                            <label>Género</label>
                            <input type="text" class="form-control" value="{{ ucfirst($computadora->gender) ?? '—' }}" disabled>
                        </div>

                        {{-- Fecha de nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label>Fecha de nacimiento</label>
                            <input type="text" class="form-control" value="{{ $computadora->birth_date ? $computadora->birth_date->format('d/m/Y') : '—' }}" disabled>
                        </div>

                        {{-- Acceso a Internet --}}
                        <div class="col-md-6 mb-3">
                            <label>Acceso a Internet</label>
                            <input type="text" class="form-control" value="{{ $computadora->internet_access ? 'Sí' : 'No' }}" disabled>
                        </div>

                        {{-- Propósito de uso --}}
                        <div class="col-md-6 mb-3">
                            <label>Propósito de uso</label>
                            <input type="text" class="form-control" value="{{ ucfirst($computadora->usage_purpose) ?? '—' }}" disabled>
                        </div>

                        {{-- Usuario asociado --}}
                        <div class="col-md-6 mb-3">
                            <label>Usuario asociado</label>
                            <input type="text" class="form-control" value="{{ $computadora->user ? $computadora->user->name : '—' }}" disabled>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.computadoras.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Eliminar Computadora
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

