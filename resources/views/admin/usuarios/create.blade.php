@extends('layouts.admin')
@section('title', 'Crear Usuarios')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo usuario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/usuarios/create') }}" method="POST">
                        @csrf

                        <div class="row g-3">

                            {{-- Nombre --}}
                            <div class="col-md-6">
                                <label class="form-label">Nombre del usuario <b>*</b></label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                    required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label">Email <b>*</b></label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                    required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Teléfono --}}
                            <div class="col-md-6">
                                <label class="form-label">Teléfono</label>
                                <input type="text" value="{{ old('phone') }}" name="phone" class="form-control">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Dirección --}}
                            <div class="col-md-6">
                                <label class="form-label">Dirección</label>
                                <textarea name="address" class="form-control" rows="1">{{ old('address') }}</textarea>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Género --}}
                            <div class="flex-fill col-md-6">
                                <label for="gender" class="form-label">Género</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="">-- Selecciona un género --</option>
                                    <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino
                                    </option>
                                    <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>Femenino
                                    </option>
                                    <option value="otro" {{ old('gender') == 'otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="col-md-6">
                                <label class="form-label">Contraseña <b>*</b></label>
                                <input type="password" name="password" class="form-control" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Confirmar contraseña --}}
                            <div class="col-md-6">
                                <label class="form-label">Verifica la contraseña <b>*</b></label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div><!-- fin row -->

                        <hr class="mt-4">

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
