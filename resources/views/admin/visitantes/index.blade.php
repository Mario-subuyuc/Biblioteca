@extends('layouts.admin')
@section('title', 'Visitantes')

@section('content')
    <div class="col">
        <h1>Listado de Visitantes</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <h3 class="card-title">Visitantes Registrados</h3>
                    <div class="card-tools">
                    <a href="{{ route('admin.visitantes.create') }}" class="btn btn-primary">
                        Registrar nuevo
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Ubicación</th>
                                <th style="text-align: center">Año de nacimiento</th>
                                <th style="text-align: center">Género</th>
                                <th style="text-align: center">Etnicidad</th>
                                <th style="text-align: center">Ocupación</th>
                                <th style="text-align: center">Fecha visita</th>
                                <th style="text-align: center">Hora visita</th>
                                <th style="text-align: center">Usuario asociado</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitantes as $visitante)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $visitante->name }}</td>
                                    <td style="text-align: center">{{ $visitante->location ?? '—' }}</td>
                                    <td style="text-align: center">{{ $visitante->birth_year ?? '—' }}</td>
                                    <td style="text-align: center">{{ $visitante->gender ?? '—' }}</td>
                                    <td style="text-align: center">{{ $visitante->ethnicity ?? '—' }}</td>
                                    <td style="text-align: center">{{ $visitante->occupation ?? '—' }}</td>
                                    <td style="text-align: center">{{ $visitante->visit_date }}</td>
                                    <td style="text-align: center">{{ $visitante->visit_time }}</td>
                                    <td style="text-align: center">
                                        {{ $visitante->user ? $visitante->user->name : '—' }}
                                    </td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.visitantes.show', $visitante->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('admin.visitantes.edit', $visitante->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="{{ url('admin/visitantes/' . $visitante->id . '/confirm-delete') }}"
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Visitantes",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Visitantes",
                    "infoFiltered": "(filtrado de _MAX_ visitantes)",
                    "lengthMenu": "Mostrar _MENU_ visitantes",
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
