@extends('layouts.admin')
@section('title', 'Usuarios')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Listado de Usuarios</h1>
        </div>
    </div>
    <p>Listado de todos los usuarios registrados en la biblioteca</p>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i> Registrar nuevo
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Teléfono</th>
                                <th style="text-align: center">Dirección</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $usuario->name }}</td>
                                    <td style="text-align: center">{{ $usuario->email }}</td>
                                    <td style="text-align: center">{{ $usuario->phone ?? '—' }}</td>
                                    <td style="text-align: center">{{ $usuario->address ?? '—' }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.usuarios.show', $usuario->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="{{ url('admin/usuarios/' . $usuario->id . '/confirm-delete') }}"
                                                type="button" class="btn btn-danger btn-sm"><i
                                                    class="bi bi-trash3"></i>Borrar</a>
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
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "Todos"]
                ],
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                    "infoFiltered": "(filtrado de _MAX_ usuarios)",
                    "lengthMenu": "Mostrar _MENU_ usuarios",
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
                buttons: [{
                        extend: 'collection',
                        text: '<i class="bi bi-file-earmark-text"></i> Reportes',
                        orientation: 'landscape',
                        buttons: [{
                                text: 'Copiar',
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'PDF',
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'CSV',
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'Excel',
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            },
                            {
                                text: 'Imprimir',
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible:not(.no-export)'
                                }
                            }
                        ]
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="bi bi-eye"></i> Visor de columnas'
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
