@extends('layouts.admin')
@section('title', 'Recomendaciones por Clasificación Dewey')
@section('content')

    <div class="container-fluid">
        <h1 class="mb-4"><i class="bi bi-stars"></i> Recomendaciones de Libros por Clasificación Dewey</h1>
        <p class="text-muted">Basadas en los préstamos más frecuentes registrados en la biblioteca.</p>

        @foreach ($recomendaciones as $codigo => $data)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-indigo text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-book-half"></i> {{ $codigo }} — {{ $data['descripcion'] }}
                    </h5>
                </div>

                <div class="card-body">
                    @if ($data['libros']->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover data-table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Veces prestado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['libros'] as $index => $item)
                                        <tr>
                                            <td>{{ $item->title ?? '—' }}</td>
                                            <td>{{ $item->author ?? 'Desconocido' }}</td>
                                            <td><span class="badge bg-info">{{ $item->total }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            <i class="bi bi-exclamation-circle"></i> Aún no hay préstamos registrados en esta categoría.
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- DataTables --}}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.data-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    },
                    pageLength: 3,
                    lengthChange: false,
                    ordering: true,
                    searching: false,
                    info: false
                });
            });
        </script>
    @endpush

@endsection
