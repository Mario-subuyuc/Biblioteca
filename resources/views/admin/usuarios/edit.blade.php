@extends('layouts.admin')
@section('title', 'Editar Usuario')
@section('content')
<div class="row">
    <h1>Modificar Usuario: {{ $usuario->name }}</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-success shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/usuarios/'.$usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3"><!-- Grid con espacio -->

                        {{-- Nombre --}}
                        <div class="col-md-6">
                            <label class="form-label">Nombre del usuario <b>*</b></label>
                            <input type="text" name="name" value="{{ old('name', $usuario->name) }}" class="form-control" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <label class="form-label">Email <b>*</b></label>
                            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="form-control" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Teléfono --}}
                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="phone" value="{{ old('phone', $usuario->phone) }}" class="form-control">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6">
                            <label class="form-label">Dirección</label>
                            <textarea name="address" class="form-control" rows="1">{{ old('address', $usuario->address) }}</textarea>
                            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Contraseña --}}
                        <div class="col-md-6">
                            <label class="form-label">Contraseña (dejar en blanco si no desea cambiar)</label>
                            <input type="password" name="password" class="form-control">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Confirmar contraseña --}}
                        <div class="col-md-6">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                    </div><!-- /row -->

                    <hr class="mt-4">

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
