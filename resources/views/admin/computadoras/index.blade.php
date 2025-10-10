@extends('layouts.admin')
@section('title', 'Computadoras')

@section('content')
<div class="col">
    <h1>Registro de Computadoras</h1>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Computadoras Registradas</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.computadoras.create') }}" class="btn btn-primary">
                        Registrar nueva
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Nombre</th>
                            <th style="text-align: center">Género</th>
                            <th style="text-align: center">Fecha de Nacimiento</th>
                            <th style="text-align: center">Acceso a Internet</th>
                            <th style="text-align: center">Propósito de uso</th>
                            <th style="text-align: center">Usuario asociado</th>
                            <th style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($computadoras as $comp)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center">{{ $comp->name }}</td>
                                <td style="text-align: center">{{ ucfirst($comp->gender ?? '—') }}</td>
                                <td style="text-align: center">{{ $comp->birth_date?->format('d/m/Y') ?? '—' }}</td>
                                <td style="text-align: center">
                                    {{ $comp->internet_access ? 'Sí' : 'No' }}
                                </td>
                                <td style="text-align: center">
                                    {{ $comp->usage_purpose ?? '—' }}
                                </td>
                                <td style="text-align: center">
                                    {{ $comp->user?->name ?? '—' }}
                                </td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.computadoras.show', $comp->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('admin.computadoras.edit', $comp->id) }}" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <a href="{{ url('admin/computadoras/' . $comp->id . '/confirm-delete') }}"
                                           class="btn btn-danger btn-sm">
                                           <i class="bi bi-trash3"></i> Borrar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Script de DataTables --}}
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [
                {
                    extend: 'collection',
                    text: '<i class="bi bi-file-earmark-text"></i> Reportes',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                },
                {
                    extend: 'colvis',
                    text: '<i class="bi bi-eye"></i> Columnas'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
