@extends('layouts.admin')
@section('title', 'Crear Lector')
@section('content')

<div class="row mb-3">
    <div class="col">
        <h1>Registrar Nuevo Lector</h1>
    </div>
</div>
<hr>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del lector</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.lectores.store') }}" method="POST" class="d-flex flex-column gap-3">
                    @csrf

                    {{-- Seleccionar usuario --}}
                    <div class="form-group">
                        <label>Usuario <b>*</b></label>
                        <select name="user_id" class="form-control" required>
                            <option value="">-- Selecciona un usuario --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id') <small style="color:red">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        {{-- Fecha de nacimiento --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="form-control">
                                @error('birth_date') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Género --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Género</label>
                                <select name="gender" class="form-control">
                                    <option value="">-- Selecciona un género --</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Masculino</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femenino</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('gender') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- DPI --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DPI <b>*</b></label>
                                <input type="text" name="dpi" value="{{ old('dpi') }}" class="form-control" required>
                                @error('dpi') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Ocupación --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ocupación</label>
                                <input type="text" name="occupation" value="{{ old('occupation') }}" class="form-control">
                                @error('occupation') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Etnia --}}
                    <div class="form-group">
                        <label>Etnia</label>
                        <select name="ethnicity" class="form-control">
                            <option value="">-- Selecciona una etnia --</option>
                            @foreach($ethnicities as $ethnicity)
                                <option value="{{ $ethnicity }}" {{ old('ethnicity') == $ethnicity ? 'selected' : '' }}>
                                    {{ $ethnicity }}
                                </option>
                            @endforeach
                        </select>
                        @error('ethnicity') <small style="color:red">{{ $message }}</small> @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.lectores.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Lector</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

