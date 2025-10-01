@extends('layouts.admin')
@section('title', 'Crear Visitante')
@section('content')
<div class="row mb-3">
    <h1>Registro de un nuevo visitante</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.visitantes.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Nombre --}}
                        <div class="col-md-6 mb-3">
                            <label>Nombre del visitante <b>*</b></label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Ubicación --}}
                        <div class="col-md-6 mb-3">
                            <label>Ubicación</label>
                            <input type="text" value="{{ old('location') }}" name="location" class="form-control">
                            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Año de nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label>Año de nacimiento</label>
                            <input type="number" value="{{ old('birth_year') }}" name="birth_year" class="form-control" min="1900" max="{{ date('Y') }}">
                            @error('birth_year') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Género --}}
                        <div class="col-md-6 mb-3">
                            <label>Género</label>
                            <select name="gender" class="form-control">
                                <option value="">-- Seleccione --</option>
                                <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ old('gender') == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Etnicidad --}}
                        <div class="col-md-6 mb-3">
                            <label>Etnicidad</label>
                            <input type="text" value="{{ old('ethnicity') }}" name="ethnicity" class="form-control">
                            @error('ethnicity') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Ocupación --}}
                        <div class="col-md-6 mb-3">
                            <label>Ocupación</label>
                            <input type="text" value="{{ old('occupation') }}" name="occupation" class="form-control">
                            @error('occupation') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Fecha de visita --}}
                        <div class="col-md-6 mb-3">
                            <label>Fecha de visita <b>*</b></label>
                            <input type="date" value="{{ old('visit_date') }}" name="visit_date" class="form-control" required>
                            @error('visit_date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Hora de visita --}}
                        <div class="col-md-6 mb-3">
                            <label>Hora de visita <b>*</b></label>
                            <input type="time" value="{{ old('visit_time') }}" name="visit_time" class="form-control" required>
                            @error('visit_time') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Usuario asociado --}}
                        <div class="col-md-12 mb-3">
                            <label>Usuario asociado</label>
                            <select name="user_id" class="form-control">
                                <option value="">-- Ninguno --</option>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ old('user_id') == $usuario->id ? 'selected' : '' }}>
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.visitantes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Visitante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
