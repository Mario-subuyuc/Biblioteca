@extends('layouts.admin')
@section('title', 'Mostrar Donación')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1><i class="bi bi-cash-stack"></i> Donación #{{ $donacion->id }}</h1>
            <p class="text-muted">Detalles completos del registro de la donación</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0"><i class="bi bi-card-list"></i> Datos de la Donación</h3>
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

                    {{-- FECHAS DEL REGISTRO --}}
                    <hr class="my-4">
                    <h5 class="mb-3">⏱️ Fechas del registro</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Fecha de creación</dt>
                        <dd class="col-sm-8">
                            {{ optional($donacion->created_at)->format('d/m/Y H:i:s') ?? 'No disponible' }}
                        </dd>

                        <dt class="col-sm-4">Última actualización</dt>
                        <dd class="col-sm-8">
                            {{ optional($donacion->updated_at)->format('d/m/Y H:i:s') ?? 'No disponible' }}
                        </dd>
                    </dl>

                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.donaciones.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
