@extends('layouts.admin')
@section('title', 'Editar Donación')

@section('content')
    <div class="row mb-3">
        <h1><i class="bi bi-cash-stack"></i> Editar Donación #{{ $donacion->id }}</h1>
    </div>
    <div class="row">
        <p class="text-muted">Actualiza los datos de la donación registrada</p>
    </div>
    <hr>

    <div class="card card-outline card-success shadow-sm">
        <div class="card-header bg-success text-white">
            <h3 class="card-title mb-0"><i class="bi bi-pencil-square"></i> Formulario de Edición</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.donaciones.update', $donacion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Usuario que dona (lector) --}}
                    <div class="col-md-6 mb-3">
                        <label for="reader_id" class="form-label">Usuario que dona (lector)</label>
                        <select name="reader_id" id="reader_id" class="form-control">
                            <option value="">-- Seleccione un lector donante --</option>
                            @foreach ($readers as $reader)
                                <option value="{{ $reader->id }}"
                                    {{ old('reader_id', $donacion->reader_id) == $reader->id ? 'selected' : '' }}>
                                    {{ $reader->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('reader_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Usuario que recibe (directivo) --}}
                    <div class="col-md-6 mb-3">
                        <label for="directive_id" class="form-label">Usuario que recibe (directivo) <b>*</b></label>
                        <select name="directive_id" id="directive_id" class="form-control" required>
                            <option value="">-- Seleccione un directivo --</option>
                            @foreach ($directives as $directive)
                                <option value="{{ $directive->id }}"
                                    {{ old('directive_id', $donacion->directive_id) == $directive->id ? 'selected' : '' }}>
                                    {{ $directive->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('directive_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Monto --}}
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">Monto donado (Q) <b>*</b></label>
                        <input type="number" name="amount" id="amount" class="form-control" step="0.01"
                            min="0.01" value="{{ old('amount', $donacion->amount) }}" required>
                        @error('amount')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Método --}}
                    <div class="col-md-6 mb-3">
                        <label for="method" class="form-label">Método de donación <b>*</b></label>
                        <select name="method" id="method" class="form-control" required>
                            <option value="">-- Seleccione un método --</option>
                            <option value="Efectivo"
                                {{ old('method', $donacion->method) == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                            <option value="Transferencia bancaria"
                                {{ old('method', $donacion->method) == 'Transferencia bancaria' ? 'selected' : '' }}>
                                Transferencia bancaria</option>
                            <option value="Depósito"
                                {{ old('method', $donacion->method) == 'Depósito' ? 'selected' : '' }}>Depósito</option>
                            <option value="Cheque" {{ old('method', $donacion->method) == 'Cheque' ? 'selected' : '' }}>
                                Cheque</option>
                            <option value="Otro" {{ old('method', $donacion->method) == 'Otro' ? 'selected' : '' }}>Otro
                            </option>
                        </select>
                        @error('method')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- Fecha --}}
                    <div class="col-md-6 mb-3">
                        <label for="donation_date" class="form-label">Fecha de donación <b>*</b></label>
                        <input type="date" name="donation_date" id="donation_date" class="form-control"
                            value="{{ old('donation_date', \Carbon\Carbon::parse($donacion->donation_date)->format('Y-m-d')) }}"
                            required>
                        @error('donation_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- Nota --}}
                    <div class="col-md-12 mb-3">
                        <label for="note" class="form-label">Nota</label>
                        <textarea name="note" id="note" class="form-control" rows="3">{{ old('note', $donacion->note) }}</textarea>
                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.donaciones.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Actualizar Donación
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
