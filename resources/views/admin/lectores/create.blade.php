@extends('layouts.admin')
@section('title', 'Crear Lector')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1 class="mb-0">Registrar Nuevo Lector</h1>
            <small class="text-muted">Completa los datos requeridos para crear un nuevo lector.</small>
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
                    <form action="{{ route('admin.lectores.store') }}" method="POST" class="d-flex flex-column gap-4">
                        @csrf

                        {{-- Datos de Usuario --}}
                        <h5 class="mt-4">Datos del Usuario</h5>
                        <div class="d-flex flex-wrap gap-3">
                            {{-- Nombre --}}
                            <div class="flex-fill col-md-6">
                                <label for="name" class="form-label">Nombre completo <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="form-control" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="flex-fill col-md-6">
                                <label for="email" class="form-label">Correo <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control" required>
                                @error('email')
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

                            {{-- Teléfono --}}
                            <div class="flex-fill col-md-6">
                                <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="form-control" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Dirección --}}
                            <div class="flex-fill col-md-6">
                                <label for="address" class="form-label">Dirección <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="address" name="address" value="{{ old('address') }}"
                                    class="form-control" required>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="flex-fill col-md-6">
                                <label for="password" class="form-label">Contraseña <span
                                        class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Confirmar Contraseña --}}
                            <div class="flex-fill col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña <span
                                        class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required>
                            </div>
                        </div>



                        {{-- Datos de Lector --}}
                        <h5 class="mt-4">Datos del Lector</h5>
                        <div class="d-flex flex-wrap gap-3">
                            {{-- Fecha de nacimiento --}}
                            <div class="flex-fill col-md-6">
                                <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                                    class="form-control">
                                @error('birth_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- DPI --}}
                            <div class="flex-fill col-md-6">
                                <label for="dpi" class="form-label">DPI <span class="text-danger">*</span></label>
                                <input type="text" id="dpi" name="dpi" value="{{ old('dpi') }}"
                                    class="form-control" required>
                                @error('dpi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Ocupación --}}
                            <div class="flex-fill col-md-6">
                                <label for="occupation" class="form-label">Ocupación</label>
                                <input type="text" id="occupation" name="occupation" value="{{ old('occupation') }}"
                                    class="form-control">
                                @error('occupation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Etnia --}}
                            <div class="flex-fill col-md-6">
                                <label for="ethnicity" class="form-label">Etnia</label>
                                <select id="ethnicity" name="ethnicity" class="form-control" required>
                                    <option value="" disabled selected>-- Selecciona una etnia --</option>
                                    <option value="maya" {{ old('ethnicity') == 'maya' ? 'selected' : '' }}>Maya
                                    </option>
                                    <option value="ladina" {{ old('ethnicity') == 'ladina' ? 'selected' : '' }}>Ladina
                                    </option>
                                    <option value="garifuna" {{ old('ethnicity') == 'garifuna' ? 'selected' : '' }}>
                                        Garífuna</option>
                                    <option value="xinca" {{ old('ethnicity') == 'xinca' ? 'selected' : '' }}>Xinca
                                    </option>
                                    <option value="mestizo" {{ old('ethnicity') == 'mestizo' ? 'selected' : '' }}>Mestizo
                                    </option>
                                    <option value="otro" {{ old('ethnicity') == 'otro' ? 'selected' : '' }}>Otro
                                    </option>
                                </select>
                                @error('ethnicity')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Botones --}}
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.lectores.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Registrar Lector
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
