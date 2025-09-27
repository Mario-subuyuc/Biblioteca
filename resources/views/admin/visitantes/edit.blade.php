@extends('layouts.admin')
@section('title', 'Editar Visitante')
@section('content')
<div class="row">
    <h1>Modificar Visitante: {{ $visitante->name }}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.visitantes.update', $visitante->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nombre --}}
                    <div class="form-group">
                        <label>Nombre del visitante <b>*</b></label>
                        <input type="text" name="name" value="{{ old('name', $visitante->name) }}" class="form-control" required>
                        @error('name') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Ubicación --}}
                    <div class="form-group">
                        <label>Ubicación</label>
                        <input type="text" name="location" value="{{ old('location', $visitante->location) }}" class="form-control">
                        @error('location') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Año de nacimiento --}}
                    <div class="form-group">
                        <label>Año de nacimiento</label>
                        <input type="number" name="birth_year" min="1900" max="{{ date('Y') }}"
                               value="{{ old('birth_year', $visitante->birth_year) }}" class="form-control">
                        @error('birth_year') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Género --}}
                    <div class="form-group">
                        <label>Género</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Seleccione --</option>
                            <option value="Masculino" {{ old('gender', $visitante->gender) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino"  {{ old('gender', $visitante->gender) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="Otro"      {{ old('gender', $visitante->gender) == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('gender') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Etnicidad --}}
                    <div class="form-group">
                        <label>Etnicidad</label>
                        <input type="text" name="ethnicity" value="{{ old('ethnicity', $visitante->ethnicity) }}" class="form-control">
                        @error('ethnicity') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Ocupación --}}
                    <div class="form-group">
                        <label>Ocupación</label>
                        <input type="text" name="occupation" value="{{ old('occupation', $visitante->occupation) }}" class="form-control">
                        @error('occupation') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Fecha de visita --}}
                    <div class="form-group">
                        <label>Fecha de visita <b>*</b></label>
                        <input type="date" name="visit_date"
                               value="{{ old('visit_date', $visitante->visit_date ? \Carbon\Carbon::parse($visitante->visit_date)->format('Y-m-d') : '') }}"
                               class="form-control" required>
                        @error('visit_date') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Hora de visita --}}
                    <div class="form-group">
                        <label>Hora de visita <b>*</b></label>
                        <input type="time" name="visit_time"
                               value="{{ old('visit_time', $visitante->visit_time ? \Carbon\Carbon::parse($visitante->visit_time)->format('H:i') : '') }}"
                               class="form-control" required>
                        @error('visit_time') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    {{-- Usuario asociado --}}
                    <div class="form-group">
                        <label>Usuario asociado (opcional)</label>
                        <select name="user_id" class="form-control">
                            <option value="">-- Ninguno --</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ old('user_id', $visitante->user_id) == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id') <small style="color:red">{{ $message }}</small> @enderror
                    </div>
                    <br>

                    <hr>

                    <div class="form-group">
                        <a href="{{ route('admin.visitantes.show', $visitante->id) }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar Visitante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
