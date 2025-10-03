@extends('layouts.admin')
@section('title', 'Eliminar Usuario')
@section('content')
<div class="d-flex flex-column gap-3 mb-3">
    <h1>Eliminar Usuario: {{ $usuario->name }}</h1>
    <p class="text-danger">
        ¡Atención! Esta acción es irreversible.
        Se eliminarán todos los registros relacionados con este usuario.
    </p>
</div>

<hr>

<div class="d-flex justify-content-center">
    <div class="card card-danger w-75">
        <div class="card-header">
            <h3 class="card-title">Detalles del Usuario</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/usuarios/'.$usuario->id) }}" method="POST" class="d-flex flex-column gap-3">
                @csrf
                @method('DELETE')

                {{-- Nombre --}}
                <div class="d-flex flex-column">
                    <label><b>Nombre</b></label>
                    <input type="text" class="form-control" value="{{ $usuario->name }}" disabled>
                </div>

                {{-- Email --}}
                <div class="d-flex flex-column">
                    <label><b>Email</b></label>
                    <input type="email" class="form-control" value="{{ $usuario->email }}" disabled>
                </div>

                {{-- Teléfono --}}
                <div class="d-flex flex-column">
                    <label><b>Teléfono</b></label>
                    <input type="text" class="form-control" value="{{ $usuario->phone ?? '—' }}" disabled>
                </div>

                {{-- Dirección --}}
                <div class="d-flex flex-column">
                    <label><b>Dirección</b></label>
                    <textarea class="form-control" disabled>{{ $usuario->address ?? '—' }}</textarea>
                </div>

                {{-- Género --}}
                <div class="d-flex flex-column">
                    <label><b>Género</b></label>
                    <textarea class="form-control" disabled>{{ $usuario->gender ?? '—' }}</textarea>
                </div>

                <hr>

                {{-- Botones --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3"></i> Deshabilitar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

