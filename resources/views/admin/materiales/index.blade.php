@extends('layouts.admin')
@section('title', 'Materiales')
@section('content')
    <div class="row">
        <h1>Inventario de Materiales</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Materiales Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.materiales.create') }}" class="btn btn-primary">
                            Registrar Nuevo Material
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="materialsTable" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align: center">Nro</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Cantidad</th>
                                <th style="text-align: center">Donación</th>
                                <th style="text-align: center">Categoría</th>
                                <th style="text-align: center">Unidad</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $material)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $material->name }}</td>
                                    <td style="text-align: center">{{ $material->quantity }}</td>
                                    <td style="text-align: center">{{ $material->donation ? 'Sí' : 'No' }}</td>
                                    <td style="text-align: center">{{ $material->category }}</td>
                                    <td style="text-align: center">{{ $material->unit }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.materiales.show', $material->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('admin.materiales.edit', $material->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="{{ url('admin/materiales/'.$material->id.'/confirm-delete') }}" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3"></i> Borrar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        $(function() {
                            $("#materialsTable").DataTable({
                                "pageLength": 5,
                                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ materiales",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 materiales",
                                    "infoFiltered": "(Filtrado de _MAX_ total de materiales)",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": { "first": "Primero", "last": "Último", "next": "Siguiente", "previous": "Anterior" }
                                },
                                "responsive": true,
                                "lengthChange": true,
                                "autoWidth": false,
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection

