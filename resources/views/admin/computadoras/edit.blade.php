@extends('layouts.admin')
@section('title', 'Editar Computadora')
@section('content')
<div class="row mb-3">
    <h1>Modificar Registro: {{ $computadora->name ?? "ID #{$computadora->id}" }}</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Editar datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.computadoras.update', $computadora->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- Nombre (opcional si existe user_id) --}}
                        <div class="col-md-6 mb-3">
                            <label>Nombre (si no está en usuarios)</label>
                            <input type="text" name="name" value="{{ old('name', $computadora->name) }}" class="form-control" placeholder="Ej. Juan Pérez">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Género --}}
                        <div class="col-md-6 mb-3">
                            <label>Género <b>*</b></label>
                            <select name="gender" class="form-control" required>
                                <option value="">-- Seleccione --</option>
                                <option value="masculino" {{ old('gender', $computadora->gender) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino"  {{ old('gender', $computadora->gender) == 'femenino'  ? 'selected' : '' }}>Femenino</option>
                                <option value="otro"      {{ old('gender', $computadora->gender) == 'otro'      ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Fecha de nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label>Fecha de nacimiento <b>*</b></label>
                            <input type="date" name="birth_date" class="form-control"
                                   value="{{ old('birth_date', $computadora->birth_date ? $computadora->birth_date->format('Y-m-d') : '') }}" required>
                            @error('birth_date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Acceso a Internet --}}
                        <div class="col-md-6 mb-3">
                            <label>Acceso a Internet <b>*</b></label>
                            <select name="internet_access" class="form-control" required>
                                <option value="">-- Seleccione --</option>
                                <option value="1" {{ (string) old('internet_access', $computadora->internet_access) === '1' ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ (string) old('internet_access', $computadora->internet_access) === '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('internet_access') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Propósito de uso --}}
                        <div class="col-md-12 mb-3">
                            <label>Propósito de uso del equipo <b>*</b></label>
                            <select name="usage_purpose" class="form-control" required>
                                <option value="">-- Seleccione una opción --</option>
                                <option value="juegos" {{ old('usage_purpose', $computadora->usage_purpose) == 'juegos' ? 'selected' : '' }}>Juegos</option>
                                <option value="teclear documentos" {{ old('usage_purpose', $computadora->usage_purpose) == 'teclear documentos' ? 'selected' : '' }}>Teclear documentos</option>
                                <option value="estudiar" {{ old('usage_purpose', $computadora->usage_purpose) == 'estudiar' ? 'selected' : '' }}>Estudiar</option>
                                <option value="consultar información" {{ old('usage_purpose', $computadora->usage_purpose) == 'consultar información' ? 'selected' : '' }}>Consultar información</option>
                                <option value="redes sociales" {{ old('usage_purpose', $computadora->usage_purpose) == 'redes sociales' ? 'selected' : '' }}>Redes sociales</option>
                                <option value="revisar correo" {{ old('usage_purpose', $computadora->usage_purpose) == 'revisar correo' ? 'selected' : '' }}>Revisar correo</option>
                                <option value="rasberry" {{ old('usage_purpose', $computadora->usage_purpose) == 'rasberry' ? 'selected' : '' }}>Raspberry</option>
                                <option value="otro" {{ old('usage_purpose', $computadora->usage_purpose) == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('usage_purpose') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Usuario asociado (opcional) --}}
                        <div class="col-md-12 mb-3">
                            <label>Usuario asociado (opcional)</label>
                            <select name="user_id" class="form-control">
                                <option value="">-- Ninguno --</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}"
                                        {{ (string) old('user_id', $computadora->user_id) === (string) $usuario->id ? 'selected' : '' }}>
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.computadoras.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
