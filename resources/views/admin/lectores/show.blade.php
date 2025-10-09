@extends('layouts.admin')
@section('title', 'Mostrar Lector')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-book"></i> Lector: {{ $lector->user->name }}</h1>
            <p class="text-muted">Detalles completos del lector registrado</p>
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
                        <dd class="col-sm-8">{{ $lector->user->name }}</dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $lector->user->email }}</dd>

                        <dt class="col-sm-4">Teléfono</dt>
                        <dd class="col-sm-8">{{ $lector->user->phone ?? '—' }}</dd>

                        <dt class="col-sm-4">Dirección</dt>
                        <dd class="col-sm-8">{{ $lector->user->address ?? '—' }}</dd>

                        <dt class="col-sm-4">Género</dt>
                        <dd class="col-sm-8">{{ ucfirst($lector->user->gender ?? '—') }}</dd>
                    </dl>

                    {{-- DIVISOR --}}
                    <hr class="my-4">

                    {{-- DATOS DEL LECTOR --}}
                    <h5 class="mb-3">📖 Datos de Lector</h5>
                    <dl class="row">
                        <dt class="col-sm-4">DPI/CUI</dt>
                        <dd class="col-sm-8">{{ $lector->dpi }}</dd>

                        <dt class="col-sm-4">Fecha de nacimiento</dt>
                        <dd class="col-sm-8">
                            {{ $lector->birth_date ? \Carbon\Carbon::parse($lector->birth_date)->format('d/m/Y') : '—' }}
                        </dd>

                        <dt class="col-sm-4">Edad</dt>
                        <dd class="col-sm-8">
                            {{ $lector->birth_date ? \Carbon\Carbon::parse($lector->birth_date)->age . ' años' : '—' }}
                        </dd>

                        <dt class="col-sm-4">Ocupación</dt>
                        <dd class="col-sm-8">{{ $lector->occupation ?? '—' }}</dd>

                        <dt class="col-sm-4">Etnia</dt>
                        <dd class="col-sm-8">{{ ucfirst($lector->ethnicity ?? '—') }}</dd>
                    </dl>

                    {{-- Estadísticas --}}
                    <hr class="my-4">
                    <h5 class="mb-3">📊 Estadísticas</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Número de visitantes registrados</dt>
                        <dd class="col-sm-8">{{ $lector->user->visitors()->count() ?? 0}}</dd>

                        <dt class="col-sm-4">Número de eventos asistidos</dt>
                        <dd class="col-sm-8">{{ $lector->user->events()->count() ?? 0}}</dd>

                        <dt class="col-sm-4">Número de libros Prestados</dt>
                        <dd class="col-sm-8"> {{ $lector->user->reader->loans()->count() ?? 0 }}</dd>
                    </dl>

                    {{-- FECHAS --}}
                    <hr class="my-4">
                    <h5 class="mb-3">⏱️ Fechas</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Fecha de creación</dt>
                        <dd class="col-sm-8">{{ $lector->created_at->format('d/m/Y H:i:s') }}</dd>

                        <dt class="col-sm-4">Última actualización</dt>
                        <dd class="col-sm-8">{{ $lector->updated_at->format('d/m/Y H:i:s') }}</dd>
                    </dl>

                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('admin.lectores.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
