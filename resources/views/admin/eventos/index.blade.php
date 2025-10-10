@extends('layouts.admin')
@section('title', 'Calendario de Eventos')

@section('content')
    <div class="row mb-3">
        <h1>Eventos 2025</h1>
    </div>
    <hr>
    <div class="row d-flex align-items-stretch">
        <!-- Calendario -->
        <div class="col-md-6 mb-3">
            <div class="card card-navy shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-2">
                        <i class="bi bi-calendar-event"></i> Calendario de Eventos
                    </h3>
                </div>
                @can('admin.usuarios.index')
                    <div class="card-tools d-flex justify-content-first">
                        <button type="button" class="btn btn-light btn-sm d-flex align-items-center bg-success text-white"
                            style="gap: 0.5rem;" data-bs-toggle="modal" data-bs-target="#eventModal">
                            <i class="bi bi-plus-circle"></i> Nuevo Evento
                        </button>
                    </div>
                @endcan
                <div class="card-body p-3">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <!--Usuarios Registrados evento-->
        <div class="col-md-6 mb-3">
            <div class="card card-navy shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-1">
                        <i class="bi bi-calendar-event"></i> Eventos Registrados
                    </h3>
                </div>

                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm"id="eventsTable">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    @can('admin.usuarios.index')
                                    <th>Acciones</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->start)->format('d/m/Y H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->end)->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                @can('admin.usuarios.index')
                                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#assignUserModal{{ $event->id }}">
                                                        <i class="bi bi-person-plus"></i>
                                                    </button>

                                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#viewUsersModal{{ $event->id }}">
                                                        <i class="bi bi-people"></i>
                                                    </button>

                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#removeUserModal{{ $event->id }}">
                                                        <i class="bi bi-person-dash"></i>
                                                    </button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @can('admin.usuarios.index')
                                        {{-- Modal Asignar Usuario --}}
                                        <div class="modal fade" id="assignUserModal{{ $event->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success text-white">
                                                        <h5 class="modal-title">Asignar usuario a: {{ $event->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Cerrar"></button>
                                                    </div>
                                                    <form action="{{ route('events.assignUser', $event->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="user_id" class="form-label">Seleccionar
                                                                    Usuario</label>
                                                                <select name="user_id" id="user_id" class="form-control"
                                                                    required>
                                                                    <option value="">-- Selecciona un usuario --</option>
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}
                                                                            ({{ $user->email }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success">Asignar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Modal Ver Usuarios --}}
                                        <div class="modal fade" id="viewUsersModal{{ $event->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info text-white">
                                                        <h5 class="modal-title">Usuarios en: {{ $event->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Cerrar"></button>
                                                    </div>

                                                    <div class="d-flex justify-content-end mb-2">
                                                        <button class="btn btn-secondary btn-sm"
                                                            onclick="printModal('modalBody{{ $event->id }}')">
                                                            <i class="bi bi-printer"></i> Imprimir
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="modalBody{{ $event->id }}">
                                                        @if ($event->users->count() > 0)
                                                            <p><strong>Total de inscritos:</strong>
                                                                {{ $event->users->count() }}</p>
                                                            <p><strong>Total de inscritos mujeres:</strong>
                                                                {{ $event->users->where('gender', 'femenino')->count() }}</p>
                                                            <p><strong>Total de inscritos hombres:</strong>
                                                                {{ $event->users->where('gender', 'masculino')->count() }}</p>
                                                            <ul class="list-group">
                                                                @foreach ($event->users as $user)
                                                                    <li class="list-group-item d-flex justify-content-between">
                                                                        <div>
                                                                            <strong>{{ $user->name }}</strong><br>
                                                                            correo: 📧 {{ $user->email }}<br>
                                                                            telefono: 📞
                                                                            {{ $user->phone ?? 'No registrado' }}<br>
                                                                            género: ⚥ {{ $user->gender ?? 'Sin especificar' }}
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p class="text-muted">No hay usuarios asignados a este evento.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Modal Eliminar Usuario --}}
                                        <div class="modal fade" id="removeUserModal{{ $event->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title">Eliminar usuario de: {{ $event->title }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Cerrar"></button>
                                                    </div>
                                                    <form action="{{ route('events.removeUser', $event->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="user_id" class="form-label">Seleccionar
                                                                    Usuario</label>
                                                                <select name="user_id" id="user_id" class="form-control"
                                                                    required>
                                                                    <option value="">-- Selecciona un usuario --</option>
                                                                    @foreach ($event->users as $user)
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->name }}
                                                                            ({{ $user->email }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No hay eventos registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal crear evento -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @can('admin.usuarios.index')
                <form id="eventForm" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-navy text-white">
                            <h5 class="modal-title" id="eventModalLabel">Agregar Evento</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha Inicio</label>
                                <input type="datetime-local" class="form-control" name="start"
                                    value="{{ old('start') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fecha Fin</label>
                                <input type="datetime-local" class="form-control" name="end"
                                    value="{{ old('end') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Color</label>
                                <input type="color" class="form-control form-control-color" name="color"
                                    value="{{ old('color', '#000080') }}">
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-danger" id="deleteEventBtn"
                                style="display:none;">Eliminar</button>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-success">Guardar Evento</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endcan
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const eventForm = document.getElementById('eventForm');
            const deleteBtn = document.getElementById('deleteEventBtn');
            const modalEl = document.getElementById('eventModal');
            const bsModal = new bootstrap.Modal(modalEl);

            // Inicializar calendario
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: '/events',
                eventClick: function(info) {
                    const event = info.event;

                    // Rellenar formulario con datos del evento
                    eventForm.querySelector('input[name="title"]').value = event.title;
                    eventForm.querySelector('textarea[name="description"]').value = event.extendedProps
                        .description || '';
                    eventForm.querySelector('input[name="start"]').value = formatDateForInput(event
                        .start);
                    eventForm.querySelector('input[name="end"]').value = formatDateForInput(event.end);
                    eventForm.querySelector('input[name="color"]').value = event.backgroundColor ||
                        '#3788d8';

                    // Preparar formulario para actualizar
                    eventForm.setAttribute('data-event-id', event.id);
                    eventForm.querySelector('button[type="submit"]').textContent = "Actualizar Evento";

                    // Mostrar botón eliminar
                    deleteBtn.style.display = 'inline-block';

                    // Abrir modal usando la instancia única
                    bsModal.show();
                }
            });
            calendar.render();

            // Función para mostrar SweetAlert con audio
            function showAlert(message, icon = 'success') {
                const audio = new Audio("{{ asset('sounds/success.mp3') }}");
                audio.play();
                Swal.fire({
                    position: "top-center",
                    icon: icon,
                    title: message,
                    showConfirmButton: false,
                    timer: 4500
                });
            }

            // Formatear fecha para input datetime-local
            function formatDateForInput(date) {
                if (!date) return '';
                const d = new Date(date);
                const pad = n => n.toString().padStart(2, '0');
                return `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}T${pad(d.getHours())}:${pad(d.getMinutes())}`;
            }

            // Crear o actualizar evento
            eventForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const eventId = this.getAttribute('data-event-id');
                const url = eventId ?
                    `/events/${eventId}/update` :
                    "{{ route('admin.events.store') }}";

                fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": formData.get('_token'),
                            "Accept": "application/json"
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Usar la instancia única del modal para cerrar
                            bsModal.hide(); // cerrar modal correctamente

                            // Refrescar el calendario
                            calendar.refetchEvents();

                            // Mostrar SweetAlert con audio
                            showAlert(data.message);

                            // Reset formulario para nuevo evento
                            this.reset();
                            this.removeAttribute('data-event-id');
                            this.querySelector('button[type="submit"]').textContent = "Guardar Evento";
                            deleteBtn.style.display = 'none';
                        }
                    })
                    .catch(err => console.error(err));
            });


            // Eliminar evento
            deleteBtn.addEventListener('click', function() {
                const eventId = eventForm.getAttribute('data-event-id');
                if (!eventId) return;

                fetch(`/events/${eventId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            "Accept": "application/json"
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Refrescar calendario
                            calendar.refetchEvents();

                            // Cerrar modal usando la instancia única
                            bsModal.hide();

                            // Mostrar alerta con audio
                            showAlert(data.message);

                            // Reset formulario
                            eventForm.reset();
                            eventForm.removeAttribute('data-event-id');
                            eventForm.querySelector('button[type="submit"]').textContent =
                                "Guardar Evento";
                            deleteBtn.style.display = 'none';
                        }
                    })
                    .catch(err => console.error(err));
            });

        });
    </script>
    <script>
        $(function() {
            $("#eventsTable").DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [5, 10, 20, -1],
                    [5, 10, 20, "Todos"]
                ],
                "language": {
                    "emptyTable": "No hay eventos registrados",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ eventos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 eventos",
                    "infoFiltered": "(filtrado de _MAX_ eventos)",
                    "lengthMenu": "Mostrar _MENU_ eventos",
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
                            extend: 'pdf',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible:not(.no-export)'
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible:not(.no-export)'
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible:not(.no-export)'
                            }
                        },
                    ]
                }]
            }).buttons().container().appendTo('#eventsTable_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function printModal(modalBodyId) {
            const content = document.getElementById(modalBodyId).innerHTML;
            const printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Usuarios Evento</title>');
            printWindow.document.write('<link rel="stylesheet" href="{{ asset('css/app.css') }}">'); // si quieres estilos
            printWindow.document.write('</head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

@endsection
