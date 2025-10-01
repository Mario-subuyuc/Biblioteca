@extends('layouts.admin')
@section('title', 'Resumen de Usuarios')
@section('content')
    <div class="row mb-3">
        <h1>Sessiones 2025</h1>
    </div>
    <hr>
    <div class="row">
        <!-- Usuarios Online -->
        <div class="col-md-6 mb-3">
            <div class="card card-outline card-info h-100">
                <div class="card-header">
                    <h3 class="card-title">Usuarios Online</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">Nro</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Correo</th>
                            </tr>
                        </thead>
                        <tbody id="usuarios_online">
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $usuario->name }}</td>
                                    <td class="text-center">{{ $usuario->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Usuarios por Día -->
        <div class="col-md-2 mb-3">
        <div class="card card-outline card-info h-100 collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Usuarios por Día</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i> <!-- Icono inicial fa-plus porque está colapsada -->
                    </button>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($usuariosPorDia as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->fecha }}
                            <span class="badge badge-primary badge-pill">{{ $item->cantidad }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


        <!-- Usuarios por Semana -->
        <div class="col-md-2 mb-3">
            <div class="card card-outline card-success h-100 collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Usuarios por Semana</h3>
                    <div class="card-tools">
                        <!-- Botón para colapsar/expandir -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($usuariosPorSemana as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Año {{ $item->anio }}, Semana {{ $item->semana }}
                                <span class="badge badge-success badge-pill">{{ $item->cantidad }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <!-- Usuarios por Mes -->
        <div class="col-md-2 mb-3">
            <div class="card card-outline card-warning h-100 collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Usuarios por Mes</h3>
                    <div class="card-tools">
                        <!-- Botón para colapsar/expandir -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($usuariosPorMes as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->mes }}
                                <span class="badge badge-warning badge-pill">{{ $item->cantidad }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
