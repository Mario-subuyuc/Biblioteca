@extends('layouts.admin')
@section('title', 'Libros')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Listado de Libros</h1>
            <p>Listado de todos los libros registrados en la biblioteca</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <a href="{{ route('admin.libros.create') }}" class="btn btn-primary">
                        <i class="bi bi-book"></i> Registrar nuevo libro
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Título</th>
                                <th style="text-align: center">Autor</th>
                                <th style="text-align: center">Editorial</th>
                                <th style="text-align: center">Páginas</th>
                                <th style="text-align: center">Dewey</th>
                                <th style="text-align: center">Edición</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $book->id }}</td>
                                    <td style="text-align: center">{{ $book->title }}</td>
                                    <td style="text-align: center">{{ $book->author }}</td>
                                    <td style="text-align: center">{{ $book->publisher ?? '—' }}</td>
                                    <td style="text-align: center">{{ $book->pages ?? '—' }}</td>
                                    <td style="text-align: center">{{ $book->dewey_classification ?? '—' }}</td>
                                    <td style="text-align: center">{{ $book->edition ?? '—' }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.libros.show', $book->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('admin.libros.edit', $book->id) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="{{ url('admin/libros/' . $book->id . '/confirm-delete') }}"
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
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "Todos"]
                ],
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Libros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Libros",
                    "infoFiltered": "(filtrado de _MAX_ libros)",
                    "lengthMenu": "Mostrar _MENU_ libros",
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
                        buttons: [
                            { text: 'Copiar', extend: 'copy', exportOptions: { columns: ':visible:not(.no-export)' }},
                            { text: 'PDF', extend: 'pdf', exportOptions: { columns: ':visible:not(.no-export)' }},
                            { text: 'CSV', extend: 'csv', exportOptions: { columns: ':visible:not(.no-export)' }},
                            { text: 'Excel', extend: 'excel', exportOptions: { columns: ':visible:not(.no-export)' }},
                            { text: 'Imprimir', extend: 'print', exportOptions: { columns: ':visible:not(.no-export)' }}
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
