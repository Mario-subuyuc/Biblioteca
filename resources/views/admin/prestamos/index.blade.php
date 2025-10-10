@extends('layouts.admin')

@section('title', 'Gestión de Préstamos')

@section('content')
<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h2><i class="bi bi-book-half"></i> Gestión de Préstamos</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-end">
            <button class="btn bg-indigo" data-bs-toggle="modal" data-bs-target="#modalCrearPrestamo">
                <i class="bi bi-plus-circle"></i> Nuevo Préstamo
            </button>
        </div>
    </div>
    <br>

    <!-- Tabla de TODOS LOS PRÉSTAMOS -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📚 Todos los Préstamos</h5>
                </div>
                <div class="card-body">
                    <table id="datatable-loans" class="table table-striped table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Lector</th>
                                <th>Libro</th>
                                <th>Fecha Préstamo</th>
                                <th>Fecha Devolución</th>
                                <th>Estado</th>
                                @can('admin.usuarios.index')
                                <th>Acciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $loan->reader->user->name ?? 'Desconocido' }}</td>
                                    <td>{{ $loan->book->title ?? 'Libro eliminado' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($loan->return_date)->format('d/m/Y') }}</td>

                                    <td>
                                        @php
                                            $badge = match ($loan->status) {
                                                'activo' => 'success',
                                                'devuelto' => 'secondary',
                                                'atrasado' => 'danger',
                                                'cancelado' => 'warning',
                                                default => 'light',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}">{{ ucfirst($loan->status) }}</span>
                                    </td>
                                    @can('admin.usuarios.index')
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalEstado{{ $loan->id }}">
                                            <i class="bi bi-arrow-repeat"></i> Estado
                                        </button>
                                    </td>
                                    @endcan
                                </tr>

                                <!-- Modal actualizar estado -->
                                <div class="modal fade" id="modalEstado{{ $loan->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.prestamos.updateState', $loan->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title">Actualizar Estado</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <select name="status" class="form-select">
                                                        <option value="activo" {{ $loan->status == 'activo' ? 'selected' : '' }}>Activo</option>
                                                        <option value="devuelto" {{ $loan->status == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                                                        <option value="atrasado" {{ $loan->status == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de MIS PRÉSTAMOS -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">👤 Mis Préstamos</h5>
                </div>
                <div class="card-body">
                    <table id="datatable-myloans" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Libro</th>
                                <th>Fecha Préstamo</th>
                                <th>Fecha Devolución</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($myLoans as $loan)
                                <tr>
                                    <td>{{ $loan->book->title ?? 'Desconocido' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($loan->return_date)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $loan->status === 'activo' ? 'success' : ($loan->status === 'atrasado' ? 'danger' : 'secondary') }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No tienes préstamos activos.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal Crear Préstamo -->
<div class="modal fade" id="modalCrearPrestamo" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.prestamos.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Nuevo Préstamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Libro</label>
                        <select name="book_id" class="form-select" required>
                            <option value="">Selecciona un libro disponible</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="loan_date" class="form-label">Fecha de préstamo</label>
                        <input type="date" name="loan_date" class="form-control" value="{{ now()->toDateString() }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="return_date" class="form-label">Fecha de devolución</label>
                        <input type="date" name="return_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(function() {
    $("#datatable-loans").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        pageLength: 5,
        language: { url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json" },
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatable-loans_wrapper .col-md-6:eq(0)');

    $("#datatable-myloans").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        pageLength: 5,
        language: { url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json" },
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatable-myloans_wrapper .col-md-6:eq(0)');
});
</script>

@endsection
