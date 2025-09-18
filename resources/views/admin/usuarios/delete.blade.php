@extends('layouts.admin')
@section('title', 'Eliminar Usuario')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h1>Eliminar Usuario: {{ $usuario->name }}</h1>
        <p class="text-danger">¡Atención! Esta acción es irreversible. Se eliminarán todos los registros relacionados con este usuario.</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-8">
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Detalles del Usuario</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/usuarios/'.$usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" value="{{ $usuario->name }}" disabled>
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{ $usuario->email }}" disabled>
                    </div>

                    {{-- Teléfono --}}
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" value="{{ $usuario->phone ?? '—' }}" disabled>
                    </div>

                    {{-- Dirección --}}
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea class="form-control" disabled>{{ $usuario->adress ?? '—' }}</textarea>
                    </div>

                    <hr>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash3"></i> Eliminar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
