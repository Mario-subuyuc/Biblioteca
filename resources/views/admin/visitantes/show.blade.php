@extends('layouts.admin')
@section('title', 'Mostrar Visitante')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h1><i class="bi bi-person"></i> Visitante: {{ $visitante->name }}</h1>
        <p class="text-muted">Detalles completos del registro</p>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $visitante->id }}</dd>

                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $visitante->name }}</dd>

                    <dt class="col-sm-4">Ubicación</dt>
                    <dd class="col-sm-8">{{ $visitante->location ?? '—' }}</dd>

                    <dt class="col-sm-4">Año de nacimiento</dt>
                    <dd class="col-sm-8">{{ $visitante->birth_year ?? '—' }}</dd>

                    <dt class="col-sm-4">Género</dt>
                    <dd class="col-sm-8">{{ $visitante->gender ?? '—' }}</dd>

                    <dt class="col-sm-4">Etnicidad</dt>
                    <dd class="col-sm-8">{{ $visitante->ethnicity ?? '—' }}</dd>

                    <dt class="col-sm-4">Ocupación</dt>
                    <dd class="col-sm-8">{{ $visitante->occupation ?? '—' }}</dd>

                    <dt class="col-sm-4">Fecha de visita</dt>
                    <dd class="col-sm-8">{{ \Carbon\Carbon::parse($visitante->visit_date)->format('d/m/Y') }}</dd>

                    <dt class="col-sm-4">Hora de visita</dt>
                    <dd class="col-sm-8">{{ \Carbon\Carbon::parse($visitante->visit_time)->format('H:i') }}</dd>

                    <dt class="col-sm-4">Usuario asociado</dt>
                    <dd class="col-sm-8">{{ $visitante->user ? $visitante->user->name : '—' }}</dd>

                    <dt class="col-sm-4">Fecha de creación</dt>
                    <dd class="col-sm-8">{{ $visitante->created_at->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-4">Última actualización</dt>
                    <dd class="col-sm-8">{{ $visitante->updated_at->format('d/m/Y H:i:s') }}</dd>
                </dl>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.visitantes.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Regresar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
