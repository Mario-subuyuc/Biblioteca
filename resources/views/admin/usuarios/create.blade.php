@extends('layouts.admin')
@section('title', 'Crear Usuarios')
@section ('content')
<div class="row">
    <h1>Registro de un nuevo usuario</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/usuarios/create') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label>Nombre del usuario <b>*</b></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                        @error('name') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email <b>*</b></label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                        @error('email') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Teléfono --}}
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" value="{{ old('phone') }}" name="phone" class="form-control">
                        @error('phone') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Dirección --}}
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                        @error('address') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Contraseña --}}
                    <div class="form-group">
                        <label>Contraseña <b>*</b></label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Confirmar contraseña --}}
                    <div class="form-group">
                        <label>Verifica la contraseña <b>*</b></label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                        @error('password_confirmation') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>
                    <hr>
                    <div class="form-group">
                        <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
