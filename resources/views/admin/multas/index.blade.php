@extends('layouts.admin')

@section('title', 'Multas')

@section('content')
    <div class="container-fluid py-4">
        <h2>📌 Multas</h2>

        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Lector</th>
                    <th>Libro</th>
                    <th>Fecha préstamo</th>
                    <th>Fecha devolución</th>
                    <th>Días de atraso</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->reader->user->name ?? 'Desconocido' }}</td>
                        <td>{{ $loan->book->title ?? 'Desconocido' }}</td>
                        <td>{{ $loan->loan_date->format('d/m/Y') }}</td>
                        <td>{{ $loan->return_date->format('d/m/Y') }}</td>

                        <td>
                            @php
                                $diasAtraso = floor(
                                    \Carbon\Carbon::parse($loan->return_date)->diffInDays(now(), false),
                                );
                            @endphp

                            @if ($diasAtraso > 0)
                                {{ $diasAtraso }} día{{ $diasAtraso > 1 ? 's' : '' }} de atraso
                            @else
                                A tiempo
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No hay préstamos atrasados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
