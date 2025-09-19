@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ 0 }}</h3>
                    <p>Visitas</p>
                </div>
                <div class="icon"><i class="fas fa-door-open"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ 0 }}</h3>
                    <p>Libros Prestados</p>
                </div>
                <div class="icon"><i class="fas fa-book"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Q{{ 0 }}</h3>
                    <p>Multas</p>
                </div>
                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ 0 }}</h3>
                    <p>Eventos</p>
                </div>
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Editar Perfil</h3>

            <div class="card-tools">
                <!-- Botón para colapsar -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Minimizar">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Correo:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone">Teléfono:</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address">Dirección:</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>

    <hr>
@endsection
