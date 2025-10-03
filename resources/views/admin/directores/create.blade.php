@extends('layouts.admin')
@section('title', 'Crear Director')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1 class="mb-0">Registrar Nuevo Director</h1>
            <small class="text-muted">Completa los datos requeridos para crear un nuevo director.</small>
        </div>
    </div>
    <hr>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Formulario de Registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.directores.store') }}" method="POST" class="d-flex flex-column gap-4">
                        @csrf

                        {{-- Datos de Usuario --}}
                        <h5 class="mt-4">Datos del Usuario</h5>
                        <div class="d-flex flex-wrap gap-3">
                            {{-- Nombre --}}
                            <div class="flex-fill col-md-6">
                                <label for="name" class="form-label">Nombre completo <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Email --}}
                            <div class="flex-fill col-md-6">
                                <label for="email" class="form-label">Correo <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Género --}}
                            <div class="flex-fill col-md-6">
                                <label for="gender" class="form-label">Género</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="">-- Selecciona un género --</option>
                                    <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="otro" {{ old('gender') == 'otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Teléfono --}}
                            <div class="flex-fill col-md-6">
                                <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" required>
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Dirección --}}
                            <div class="flex-fill col-md-6">
                                <label for="address" class="form-label">Dirección <span class="text-danger">*</span></label>
                                <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" required>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="flex-fill col-md-6">
                                <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Confirmar Contraseña --}}
                            <div class="flex-fill col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña <span class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        {{-- Datos de Director --}}
                        <h5 class="mt-4">Datos del Director</h5>
                        <div class="d-flex flex-wrap gap-3">
                            {{-- Departamento --}}
                            <div class="flex-fill col-md-6">
                                <label for="department" class="form-label">Área/Departamento <span class="text-danger">*</span></label>
                                <input type="text" id="department" name="department" value="{{ old('department') }}" class="form-control" required>
                                @error('department') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Horas --}}
                            <div class="flex-fill col-md-6">
                                <label for="hours" class="form-label">Horas de Trabajo <span class="text-danger">*</span></label>
                                <input type="number" id="hours" name="hours" value="{{ old('hours') }}" class="form-control" required>
                                @error('hours') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.directores.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Registrar Director
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
