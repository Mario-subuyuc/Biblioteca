@extends('layouts.admin')
@section('title', 'Mostrar Computadora')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-pc-display"></i> Computadora: {{ $computadora->name ?? "Registro #{$computadora->id}" }}</h1>
            <p class="text-muted">Detalles completos del registro</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-sm border-info">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0"><i class="bi bi-card-list"></i> Datos Registrados</h3>
                </div>
                <div class="card-body">
                    {{-- DATOS BASICOS --}}
                    <h5 class="mb-3">💻 Datos</h5>
                    <dl class="row">
                        <dt class="col-sm-4">ID</dt>
                        <dd class="col-sm-8">{{ $computadora->id }}</dd>

                        <dt class="col-sm-4">Nombre</dt>
                        <dd class="col-sm-8">{{ $computadora->name ?? '—' }}</dd>

                        <dt class="col-sm-4">Usuario asociado</dt>
                        <dd class="col-sm-8">
                            @if ($computadora->user)
                                <i class="bi bi-person-check"></i> {{ $computadora->user->name }}
                            @else
                                — No asignado
                            @endif
                        </dd>

                        <dt class="col-sm-4">Género</dt>
                        <dd class="col-sm-8">{{ $computadora->gender ? ucfirst($computadora->gender) : '—' }}</dd>

                        <dt class="col-sm-4">Fecha de nacimiento</dt>
                        <dd class="col-sm-8">
                            {{ optional($computadora->birth_date)->format('d/m/Y') ?? '—' }}
                        </dd>
                    </dl>

                    {{-- USO / ACCESO --}}
                    <hr class="my-4">
                    <h5 class="mb-3">🔎 Uso y acceso</h5>
                    <dl class="row">
                        <dt class="col-sm-4">¿Acceso a Internet?</dt>
                        <dd class="col-sm-8">
                            @if($computadora->internet_access)
                                Sí
                            @else
                                No
                            @endif
                        </dd>

                        <dt class="col-sm-4">Propósito de uso</dt>
                        <dd class="col-sm-8">
                            {{ $computadora->usage_purpose ? ucfirst($computadora->usage_purpose) : '—' }}
                        </dd>
                    </dl>

                    {{-- FECHAS / TIMESTAMPS --}}
                    <hr class="my-4">
                    <h5 class="mb-3">⏱️ Fechas</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Fecha de creación</dt>
                        <dd class="col-sm-8">
                            {{ optional($computadora->created_at)->format('d/m/Y H:i:s') ?? '—' }}
                        </dd>

                        <dt class="col-sm-4">Última actualización</dt>
                        <dd class="col-sm-8">
                            {{ optional($computadora->updated_at)->format('d/m/Y H:i:s') ?? '—' }}
                        </dd>
                    </dl>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.computadoras.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                    <a href="{{ route('admin.computadoras.edit', $computadora->id) }}" class="btn btn-primary">
    <i class="bi bi-pencil"></i> Editar
</a>
                </div>
            </div>
        </div>
    </div>
@endsection
