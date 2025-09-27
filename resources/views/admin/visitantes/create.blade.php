@extends('layouts.admin')
@section('title', 'Crear Visitante')
@section ('content')
<div class="row">
    <h1>Registro de un nuevo visitante</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.visitantes.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label>Nombre del visitante <b>*</b></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                        @error('name') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Ubicación --}}
                    <div class="form-group">
                        <label>Ubicación</label>
                        <input type="text" value="{{ old('location') }}" name="location" class="form-control">
                        @error('location') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Año de nacimiento --}}
                    <div class="form-group">
                        <label>Año de nacimiento</label>
                        <input type="number" value="{{ old('birth_year') }}" name="birth_year" class="form-control" min="1900" max="{{ date('Y') }}">
                        @error('birth_year') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Género --}}
                    <div class="form-group">
                        <label>Género</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Seleccione --</option>
                            <option value="Masculino" {{ old('gender') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('gender') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Otro" {{ old('gender') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('gender') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Etnicidad --}}
                    <div class="form-group">
                        <label>Etnicidad</label>
                        <input type="text" value="{{ old('ethnicity') }}" name="ethnicity" class="form-control">
                        @error('ethnicity') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Ocupación --}}
                    <div class="form-group">
                        <label>Ocupación</label>
                        <input type="text" value="{{ old('occupation') }}" name="occupation" class="form-control">
                        @error('occupation') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Fecha de visita --}}
                    <div class="form-group">
                        <label>Fecha de visita <b>*</b></label>
                        <input type="date" value="{{ old('visit_date') }}" name="visit_date" class="form-control" required>
                        @error('visit_date') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Hora de visita --}}
                    <div class="form-group">
                        <label>Hora de visita <b>*</b></label>
                        <input type="time" value="{{ old('visit_time') }}" name="visit_time" class="form-control" required>
                        @error('visit_time') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Usuario asociado (opcional) --}}
                    <div class="form-group">
                        <label>Usuario asociado</label>
                        <select name="user_id" class="form-control">
                            <option value="">-- Ninguno --</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ old('user_id') == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    <hr>
                    <div class="form-group">
                        <a href="{{ route('admin.visitantes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Visitante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
