@extends('layouts.admin')
@section('title', 'Registrar Computadora')

@section('content')
    <div class="row mb-3">
        <h1>Registro de una nueva computadora</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.computadoras.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            {{-- Nombre de la persona --}}
                            <div class="col-md-6 mb-3">
                                <label>Nombre del usuario (si no está registrado)</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Ej. Juan Pérez">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Género --}}
                            <div class="col-md-6 mb-3">
                                <label>Género <b>*</b></label>
                                <select name="gender" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
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

                            {{-- Fecha de nacimiento --}}
                            <div class="col-md-6 mb-3">
                                <label>Fecha de nacimiento <b>*</b></label>
                                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}"
                                    required>
                                @error('birth_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Acceso a internet --}}
                            <div class="col-md-6 mb-3">
                                <label>¿Tiene acceso a Internet? <b>*</b></label>
                                <select name="internet_access" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="1" {{ old('internet_access') == '1' ? 'selected' : '' }}>Sí</option>
                                    <option value="0" {{ old('internet_access') == '0' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                                @error('internet_access')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Propósito de uso --}}
                            <div class="col-md-12 mb-3">
                                <label>Propósito de uso del equipo <b>*</b></label>
                                <select name="usage_purpose" class="form-control" required>
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <option value="juegos" {{ old('usage_purpose') == 'juegos' ? 'selected' : '' }}>Juegos
                                    </option>
                                    <option value="teclear documentos"
                                        {{ old('usage_purpose') == 'teclear documentos' ? 'selected' : '' }}>Teclear
                                        documentos</option>
                                    <option value="estudiar" {{ old('usage_purpose') == 'estudiar' ? 'selected' : '' }}>
                                        Estudiar</option>
                                    <option value="consultar información"
                                        {{ old('usage_purpose') == 'consultar información' ? 'selected' : '' }}>Consultar
                                        información</option>
                                    <option value="redes sociales"
                                        {{ old('usage_purpose') == 'redes sociales' ? 'selected' : '' }}>Redes sociales
                                    </option>
                                    <option value="revisar correo"
                                        {{ old('usage_purpose') == 'revisar correo' ? 'selected' : '' }}>Revisar correo
                                    </option>
                                    <option value="rasberry" {{ old('usage_purpose') == 'rasberry' ? 'selected' : '' }}>
                                        Raspberry</option>
                                    <option value="otro" {{ old('usage_purpose') == 'otro' ? 'selected' : '' }}>Otro
                                    </option>
                                </select>
                                @error('usage_purpose')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Usuario asociado --}}
                            <div class="col-md-12 mb-3">
                                <label>Usuario del sistema asociado (opcional)</label>
                                <select name="user_id" class="form-control">
                                    <option value="">-- Ninguno --</option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}"
                                            {{ old('user_id') == $usuario->id ? 'selected' : '' }}>
                                            {{ $usuario->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.computadoras.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Computadora</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
