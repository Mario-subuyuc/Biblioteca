@extends('layouts.admin')
@section('title', 'Editar Lector')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h1 class="mb-0">Editar Lector</h1>
        <small class="text-muted">Modifica los datos del lector según sea necesario.</small>
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
                <form action="{{ route('admin.lectores.update', $lector->id) }}" method="POST" class="d-flex flex-column gap-4">
                    @csrf
                    @method('PUT')

                    {{-- Datos de Usuario --}}
                    <h5>Datos del Usuario</h5>
                    <hr>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="flex-fill col-md-6">
                            <label for="name" class="form-label">Nombre completo <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name', $lector->user->name) }}"
                                class="form-control" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex-fill col-md-6">
                            <label for="email" class="form-label">Correo <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email', $lector->user->email) }}"
                                class="form-control" required>
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

                        <div class="flex-fill col-md-6">
                            <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $lector->user->phone) }}"
                                class="form-control" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex-fill col-md-6">
                            <label for="address" class="form-label">Dirección <span class="text-danger">*</span></label>
                            <input type="text" id="address" name="address" value="{{ old('address', $lector->user->address) }}"
                                class="form-control" required>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                         <div class="flex-fill col-md-6">
                            <label for="gender" class="form-label">Género</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="">-- Selecciona un género --</option>
                                <option value="masculino" {{ old('gender', $lector->gender) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ old('gender', $lector->gender) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="otro" {{ old('gender', $lector->gender) == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Datos de Lector --}}
                    <h5 class="mt-4">Datos del Lector</h5>
                    <hr>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="flex-fill col-md-6">
                            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $lector->birth_date) }}"
                                class="form-control">
                            @error('birth_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex-fill col-md-6">
                            <label for="dpi" class="form-label">DPI <span class="text-danger">*</span></label>
                            <input type="text" id="dpi" name="dpi" value="{{ old('dpi', $lector->dpi) }}"
                                class="form-control" required>
                            @error('dpi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex-fill col-md-6">
                            <label for="occupation" class="form-label">Ocupación</label>
                            <input type="text" id="occupation" name="occupation" value="{{ old('occupation', $lector->occupation) }}"
                                class="form-control">
                            @error('occupation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="flex-fill col-md-6">
                            <label for="ethnicity" class="form-label">Etnia</label>
                            <select id="ethnicity" name="ethnicity" class="form-control" required>
                                <option value="">-- Selecciona una etnia --</option>
                                <option value="maya" {{ old('ethnicity', $lector->ethnicity) == 'maya' ? 'selected' : '' }}>Maya</option>
                                <option value="ladina" {{ old('ethnicity', $lector->ethnicity) == 'ladina' ? 'selected' : '' }}>Ladina</option>
                                <option value="garifuna" {{ old('ethnicity', $lector->ethnicity) == 'garifuna' ? 'selected' : '' }}>Garífuna</option>
                                <option value="xinca" {{ old('ethnicity', $lector->ethnicity) == 'xinca' ? 'selected' : '' }}>Xinca</option>
                                <option value="mestizo" {{ old('ethnicity', $lector->ethnicity) == 'mestizo' ? 'selected' : '' }}>Mestizo</option>
                                <option value="otro" {{ old('ethnicity', $lector->ethnicity) == 'otro' ? 'selected' : '' }}>Otro</option>
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
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Actualizar Lector
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

