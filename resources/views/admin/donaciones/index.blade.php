@extends('layouts.admin')

@section('title', 'Donaciones')

@section('content')
    <div class="col">
        <h1>Lista de Donaciones</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Donaciones Registradas</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.donaciones.create') }}" class="btn btn-primary">
                            Registrar Nueva Donación
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="donationsTable" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Lector</th>
                                <th style="text-align: center">Directiva</th>
                                <th style="text-align: center">Monto</th>
                                <th style="text-align: center">Método</th>
                                <th style="text-align: center">Fecha de Donación</th>
                                <th style="text-align: center">Nota</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donations as $donation)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $donation->id }}</td>
                                    <td style="text-align: center"> {{ $donation->reader->name ?? 'Anónimo / Organización' }}</td>
                                    <td style="text-align: center">{{ $donation->directive->name }}</td>
                                    <td style="text-align: center">${{ number_format($donation->amount, 2) }}</td>
                                    <td style="text-align: center">{{ ucfirst($donation->method) }}</td>
                                    <td style="text-align: center">{{ \Carbon\Carbon::parse($donation->donation_date)->format('d M, Y') }}</td>
                                    <td style="text-align: center">{{ $donation->note ?? '—' }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.donaciones.show', $donation->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('admin.donaciones.edit', $donation->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="{{ url('admin/donaciones/' . $donation->id . '/confirm-delete') }}" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3"></i> Eliminar
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

    {{-- Script de DataTables en español --}}
    <script>
        $(function() {
            $("#donationsTable").DataTable({
                "pageLength": 5,
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "Todo"]
                ],
                "language": {
                    "emptyTable": "No hay datos disponibles",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ donaciones",
                    "infoEmpty": "Mostrando 0 a 0 de 0 donaciones",
                    "infoFiltered": "(filtrado de _MAX_ donaciones totales)",
                    "lengthMenu": "Mostrar _MENU_ donaciones",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron registros coincidentes",
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
                        orientation: 'landscape',
                        buttons: [
                            { text: 'Copiar', extend: 'copy', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'PDF', extend: 'pdf', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'CSV', extend: 'csv', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'Excel', extend: 'excel', exportOptions: { columns: ':visible:not(.no-export)' } },
                            { text: 'Imprimir', extend: 'print', exportOptions: { columns: ':visible:not(.no-export)' } }
                        ]
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="bi bi-eye"></i> Visibilidad de Columnas'
                    }
                ],
            }).buttons().container().appendTo('#donationsTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
