@extends('layouts.admin')
@section('title', 'Mostrar Usuario')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h1><i class="bi bi-person"></i> Usuario: {{ $usuario->name }}</h1>
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
                    <dd class="col-sm-8">{{ $usuario->id }}</dd>

                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $usuario->name }}</dd>

                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $usuario->email }}</dd>

                    <dt class="col-sm-4">Teléfono</dt>
                    <dd class="col-sm-8">{{ $usuario->phone ?? '—' }}</dd>

                    <dt class="col-sm-4">Dirección</dt>
                    <dd class="col-sm-8">{{ $usuario->address ?? '—' }}</dd>

                    <dt class="col-sm-4">Género</dt>
                    <dd class="col-sm-8">{{ $usuario->gender ?? '—' }}</dd>


                    <dt class="col-sm-4">Fecha de creación</dt>
                    <dd class="col-sm-8">{{ $usuario->created_at->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-4">Última actualización</dt>
                    <dd class="col-sm-8">{{ $usuario->updated_at->format('d/m/Y H:i:s') }}</dd>
                </dl>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Regresar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

