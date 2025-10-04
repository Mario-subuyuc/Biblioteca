@extends('layouts.admin')
@section('title', 'Editar Director')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1 class="mb-0">Editar Director</h1>
            <small class="text-muted">Modifica los datos del director según sea necesario.</small>
        </div>
    </div>
    <hr>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card shadow-sm border-warning">
                <div class="card-header bg-warning text-white">
                    <h3 class="card-title mb-0">Formulario de Edición</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.directores.update', $director->id) }}" method="POST"
                        class="d-flex flex-column gap-4">
                        @csrf
                        @method('PUT')
                        {{-- Datos de Usuario --}}
                        <h5>Datos del Usuario</h5>
                        <hr>
                        <div class="d-flex flex-wrap gap-3">
                            {{-- Nombre --}}
                            <div class="flex-fill col-md-6">
                                <label for="name" class="form-label">Nombre completo <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $director->user->name) }}" class="form-control" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="flex-fill col-md-6">
                                <label for="email" class="form-label">Correo <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $director->user->email) }}" class="form-control" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Contraseña (opcional) --}}
                            <div class="flex-fill col-md-6">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <small class="text-muted">Dejar vacío si no deseas cambiar la contraseña</small>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="flex-fill col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control">
                            </div>

                            {{-- Teléfono --}}
                            <div class="flex-fill col-md-6">
                                <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone"
                                    value="{{ old('phone', $director->user->phone) }}" class="form-control" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Dirección --}}
                            <div class="flex-fill col-md-6">
                                <label for="address" class="form-label">Dirección <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="address" name="address"
                                    value="{{ old('address', $director->user->address) }}" class="form-control" required>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Género --}}
                            <div class="flex-fill col-md-6">
                                <label for="gender" class="form-label">Género</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="">-- Selecciona un género --</option>
                                    <option value="masculino"
                                        {{ old('gender', $director->user->gender) == 'masculino' ? 'selected' : '' }}>
                                        Masculino</option>
                                    <option value="femenino"
                                        {{ old('gender', $director->user->gender) == 'femenino' ? 'selected' : '' }}>
                                        Femenino</option>
                                    <option value="otro"
                                        {{ old('gender', $director->user->gender) == 'otro' ? 'selected' : '' }}>Otro
                                    </option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Datos de Director --}}
                        <h5 class="mt-4">Datos del Director</h5>
                        <hr>
                        <div class="d-flex flex-wrap gap-3">
                            {{-- Departamento --}}
                            <div class="flex-fill col-md-6">
                                <label for="department" class="form-label">Área/Departamento <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="department" name="department"
                                    value="{{ old('department', $director->department) }}" class="form-control" required>
                                @error('department')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Horas --}}
                            <div class="flex-fill col-md-6">
                                <label for="hours" class="form-label">Horas de Trabajo <span
                                        class="text-danger">*</span></label>
                                <input type="number" id="hours" name="hours"
                                    value="{{ old('hours', $director->hours) }}" class="form-control" required>
                                @error('hours')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.directores.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Actualizar Director
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
