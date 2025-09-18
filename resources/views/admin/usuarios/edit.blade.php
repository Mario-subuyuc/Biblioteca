@extends('layouts.admin')
@section('title', 'Editar Usuario')
@section('content')
<div class="row">
    <h1>Modificar Usuario: {{$usuario->name}}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/usuarios/'.$usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label>Nombre del usuario <b>*</b></label>
                        <input type="text" name="name" value="{{ old('name', $usuario->name) }}" class="form-control" required>
                        @error('name') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email <b>*</b></label>
                        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="form-control" required>
                        @error('email') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Teléfono --}}
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="phone" value="{{ old('phone', $usuario->phone) }}" class="form-control">
                        @error('phone') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Dirección --}}
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea name="address" class="form-control">{{ old('address', $usuario->address) }}</textarea>
                        @error('address') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Contraseña --}}
                    <div class="form-group">
                        <label>Contraseña (dejar en blanco si no desea cambiar)</label>
                        <input type="password" name="password" class="form-control">
                        @error('password') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Confirmar contraseña --}}
                    <div class="form-group">
                        <label>Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>
                    <hr>

                    <div class="form-group">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
