@extends('layouts.admin')
@section('title', 'Eliminar Visitante')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h1>Eliminar Visitante: {{ $visitante->name }}</h1>
        <p class="text-danger">
            ⚠️ ¡Atención! Esta acción es irreversible.
            Se eliminarán todos los registros relacionados con este visitante.
        </p>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-10">
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Detalles del Visitante</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.visitantes.destroy', $visitante->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        {{-- Nombre --}}
                        <div class="col-md-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" value="{{ $visitante->name }}" disabled>
                        </div>

                        {{-- Ubicación --}}
                        <div class="col-md-6 mb-3">
                            <label>Ubicación</label>
                            <input type="text" class="form-control" value="{{ $visitante->location ?? '—' }}" disabled>
                        </div>

                        {{-- Año de nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label>Año de nacimiento</label>
                            <input type="text" class="form-control" value="{{ $visitante->birth_year ?? '—' }}" disabled>
                        </div>

                        {{-- Género --}}
                        <div class="col-md-6 mb-3">
                            <label>Género</label>
                            <input type="text" class="form-control" value="{{ $visitante->gender ?? '—' }}" disabled>
                        </div>

                        {{-- Ocupación --}}
                        <div class="col-md-6 mb-3">
                            <label>Ocupación</label>
                            <input type="text" class="form-control" value="{{ $visitante->occupation ?? '—' }}" disabled>
                        </div>

                        {{-- Fecha de visita --}}
                        <div class="col-md-6 mb-3">
                            <label>Fecha de visita</label>
                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($visitante->visit_date)->format('d/m/Y') }}" disabled>
                        </div>

                        {{-- Hora de visita --}}
                        <div class="col-md-6 mb-3">
                            <label>Hora de visita</label>
                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($visitante->visit_time)->format('H:i') }}" disabled>
                        </div>

                        {{-- Usuario asociado --}}
                        <div class="col-md-6 mb-3">
                            <label>Usuario asociado</label>
                            <input type="text" class="form-control" value="{{ $visitante->user ? $visitante->user->name : '—' }}" disabled>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.visitantes.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Eliminar Visitante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
