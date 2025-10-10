@extends('layouts.admin')
@section('title', 'Eliminar Donación')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h1><i class="bi bi-trash"></i> Eliminar Donación #{{ $donacion->id }}</h1>
        <p class="text-muted">Confirme que desea eliminar esta donación. Esta acción no se puede deshacer.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card shadow-sm border-danger">
            <div class="card-header bg-danger text-white">
                <h3 class="card-title mb-0"><i class="bi bi-exclamation-triangle"></i> Confirmación de eliminación</h3>
            </div>

            <div class="card-body">

                {{-- DATOS DE DONANTES Y RECEPTORES --}}
                <h5 class="mb-3">👥 Participantes</h5>
                <dl class="row">
                    <dt class="col-sm-4">Usuario que dona (lector)</dt>
                    <dd class="col-sm-8">
                        @if ($donacion->reader)
                            <i class="bi bi-person-heart"></i> {{ $donacion->reader->name }}
                        @else
                            — No especificado
                        @endif
                    </dd>

                    <dt class="col-sm-4">Usuario que recibe (directivo)</dt>
                    <dd class="col-sm-8">
                        @if ($donacion->directive)
                            <i class="bi bi-person-check"></i> {{ $donacion->directive->name }}
                        @else
                            — No especificado
                        @endif
                    </dd>
                </dl>

                {{-- DETALLES DE LA DONACIÓN --}}
                <hr class="my-4">
                <h5 class="mb-3">💰 Detalles de la Donación</h5>
                <dl class="row">
                    <dt class="col-sm-4">Monto</dt>
                    <dd class="col-sm-8">Q{{ number_format($donacion->amount, 2) }}</dd>

                    <dt class="col-sm-4">Método de pago</dt>
                    <dd class="col-sm-8">{{ $donacion->method }}</dd>

                    <dt class="col-sm-4">Fecha de donación</dt>
                    <dd class="col-sm-8">{{ \Carbon\Carbon::parse($donacion->donation_date)->format('d/m/Y') }}</dd>

                    <dt class="col-sm-4">Nota</dt>
                    <dd class="col-sm-8">{{ $donacion->note ?? '—' }}</dd>
                </dl>

                {{-- FORMULARIO DE ELIMINACIÓN --}}
                <hr>
                <form action="{{ route('admin.donaciones.destroy', $donacion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.donaciones.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Eliminar Donación
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
