@extends('layouts.admin')
@section('title', 'Mostrar Director')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1><i class="bi bi-person-badge"></i> Director: {{ $director->user->name }}</h1>
        <p class="text-muted">Detalles completos del director registrado</p>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
            </div>
            <div class="card-body">

                {{-- DATOS DEL USUARIO --}}
                <h5 class="mb-3">📌 Datos de Usuario</h5>
                <dl class="row">
                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $director->user->name }}</dd>

                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $director->user->email }}</dd>

                    <dt class="col-sm-4">Teléfono</dt>
                    <dd class="col-sm-8">{{ $director->user->phone ?? '—' }}</dd>

                    <dt class="col-sm-4">Dirección</dt>
                    <dd class="col-sm-8">{{ $director->user->address ?? '—' }}</dd>

                    <dt class="col-sm-4">Género</dt>
                    <dd class="col-sm-8">{{ ucfirst($director->user->gender ?? '—') }}</dd>
                </dl>

                {{-- DIVISOR --}}
                <hr class="my-4">

                {{-- DATOS DEL DIRECTOR --}}
                <h5 class="mb-3">🏢 Datos de Director</h5>
                <dl class="row">
                    <dt class="col-sm-4">Área/Departamento</dt>
                    <dd class="col-sm-8">{{ $director->department }}</dd>

                    <dt class="col-sm-4">Horas de Trabajo</dt>
                    <dd class="col-sm-8">{{ $director->hours }} horas</dd>
                </dl>

                {{-- Estadísticas --}}
                    <hr class="my-4">
                    <h5 class="mb-3">📊 Estadísticas</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Número de visitantes registrados</dt>
                        <dd class="col-sm-8">{{ $director->user->visitors()->count() }}</dd>

                        <dt class="col-sm-4">Número de eventos asistidos</dt>
                        <dd class="col-sm-8">{{ $director->user->events()->count() }}</dd>
                    </dl>

                {{-- FECHAS --}}
                <hr class="my-4">
                <h5 class="mb-3">⏱️ Fechas</h5>
                <dl class="row">
                    <dt class="col-sm-4">Fecha de creación</dt>
                    <dd class="col-sm-8">{{ $director->created_at->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-4">Última actualización</dt>
                    <dd class="col-sm-8">{{ $director->updated_at->format('d/m/Y H:i:s') }}</dd>
                </dl>

            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.directores.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Regresar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
