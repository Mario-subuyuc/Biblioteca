@extends('layouts.admin')
@section('title', 'Gestión de Reservas')
@section('content')

    <div class="row mb-3">
        <div class="col">
            <h1>Gestión de Reservas</h1>
        </div>
    </div>

    <p>Realiza la reserva de libro que decese a la fehca que deces , consulta tu historial de prestamos </p>
    <hr>

    {{-- ============================= --}}
    {{-- HISTORIAL COMPLETO --}}
    {{-- ============================= --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4><i class="bi bi-clock-history"></i> Historial de Reservas</h4>
                </div>
                <div class="card-body">
                    <table id="historial" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Lector</th>
                                <th>Libro</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $r)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $r->reader->user->name ?? '—' }}</td>
                                    <td>{{ $r->book->title ?? '—' }}</td>
                                    <td>{{ $r->date }}</td>
                                    <td>
                                        <form action="{{ route('admin.reservas.updateState', $r->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @php
                                                $color = match ($r->state) {
                                                    'pendiente' => 'warning',
                                                    'confirmada' => 'success',
                                                    'cancelada' => 'danger',
                                                    default => 'secondary',
                                                };
                                            @endphp
                                            <select name="state"
                                                class="form-select form-select-sm bg-{{ $color }} text-white"
                                                onchange="this.form.submit()">
                                                <option value="pendiente" {{ $r->state == 'pendiente' ? 'selected' : '' }}>
                                                    Pendiente</option>
                                                <option value="confirmada"
                                                    {{ $r->state == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                                <option value="cancelada" {{ $r->state == 'cancelada' ? 'selected' : '' }}>
                                                    Cancelada</option>
                                            </select>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================= --}}
    {{-- RESERVAS PERSONALES Y LIBROS DISPONIBLES --}}
    {{-- ============================= --}}
    <div class="row d-flex">
        {{-- Reservas personales --}}
        <div class="col-md-6 d-flex">
            <div class="card card-outline card-navy flex-fill h-100">
                <div class="card-header">
                    <h5><i class="bi bi-person-lines-fill"></i> Mis Reservas</h5>
                </div>
                <div class="card-body">
                    <table id="personales" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Libro</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($myReservations as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->book->title ?? '—' }}</td>
                                    <td>{{ $m->date }}</td>
                                    <td>{{ ucfirst($m->state) }}</td>
                                    <td>
                                        @if ($m->state == 'pendiente')
                                            <div class="btn-group-sm" role="group" aria-label="Acciones de reserva">
                                                <!-- Botón Cancelar -->
                                                <form action="{{ route('admin.reservas.cancel', $m->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-x-circle"></i> Cancelar
                                                    </button>
                                                </form>

                                                <!-- Botón Editar -->
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#modalEditarReserva"
                                                    data-reservation-id="{{ $m->id }}"
                                                    data-reservation-date="{{ $m->date }}">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Libros disponibles --}}
        <div class="col-md-6 d-flex">
            <div class="card card-outline card-navy flex-fill h-100">
                <div class="card-header">
                    <h5><i class="bi bi-book"></i> Libros Disponibles</h5>
                </div>
                <div class="card-body">
                    <table id="libros" class="table table-striped table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalReserva" data-book-id="{{ $book->id }}"
                                            data-book-title="{{ $book->title }}">
                                            <i class="bi bi-calendar-plus"></i> Reservar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- ============================= --}}
    {{-- MODAL RESERVA --}}
    {{-- ============================= --}}
    <div class="modal fade" id="modalReserva" tabindex="-1" role="dialog" aria-labelledby="modalReservaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalReservaLabel">Confirmar Reserva</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.reservas.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="book_id" id="modalBookId">
                        <p>¿Deseas reservar el libro <strong id="modalBookTitle"></strong>?</p>

                        <div class="form-group mt-3">
                            <label for="reservationDate">Fecha de reserva</label>
                            <input type="date" name="date" id="reservationDate" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- modal de editar --}}
    <div class="modal fade" id="modalEditarReserva" tabindex="-1" role="dialog" aria-labelledby="modalEditarReservaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalEditarReservaLabel">Editar Reserva</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditarReserva" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="reservation_id" id="editarReservationId">
                        <div class="form-group">
                            <label for="editarReservationDate">Fecha de reserva</label>
                            <input type="date" name="date" id="editarReservationDate" class="form-control"
                                required min="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ============================= --}}
    {{-- Script para pasar datos al modal --}}
    {{-- ============================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#modalReserva').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var bookId = button.data('book-id')
                var bookTitle = button.data('book-title')

                var modal = $(this)
                modal.find('#modalBookId').val(bookId)
                modal.find('#modalBookTitle').text(bookTitle)
            })
        });
    </script>

    {{-- modal para editar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#modalEditarReserva').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var reservationId = button.data('reservation-id');
                var reservationDate = button.data('reservation-date');

                var modal = $(this);
                modal.find('#editarReservationId').val(reservationId);
                modal.find('#editarReservationDate').val(reservationDate);
                modal.find('#formEditarReserva').attr('action', '/admin/reservas/' + reservationId);
            });
        });
    </script>


    {{--model de datatables--}}
    <script>
    $(document).ready(function() {
        // Historial de reservas
        $('#historial').DataTable({
            paging: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            ordering: true,
            order: [[3, "desc"]],
            columnDefs: [
                { orderable: false, targets: 4 } // columna de acciones
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });

        // Mis reservas
        $('#personales').DataTable({
            paging: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            ordering: true,
            order: [[2, "asc"]],
            columnDefs: [
                { orderable: false, targets: 4 } // columna de acciones
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });

        // Libros disponibles
        $('#libros').DataTable({
            paging: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            ordering: true,
            order: [[0, "asc"]],
            columnDefs: [
                { orderable: false, targets: 3 } // columna de acciones
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>



@endsection
