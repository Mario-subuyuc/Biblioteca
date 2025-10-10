@extends('layouts.admin')
@section('title', 'Registrar Donación')

@section('content')
    <div class="row mb-3">
        <h1>Registro de una nueva donación</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos de la donación</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.donaciones.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            {{-- Donante --}}
                            <div class="col-md-6 mb-3">
                                <label>Usuario que dona (lector)</label>
                                <select name="reader_id" class="form-control">
                                    <option value="">-- Seleccione un lector donante --</option>
                                    @foreach ($readers as $reader)
                                        <option value="{{ $reader->id }}"
                                            {{ old('reader_id') == $reader->id ? 'selected' : '' }}>
                                            {{ $reader->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('reader_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Receptor --}}
                            <div class="col-md-6 mb-3">
                                <label>Usuario que recibe (directivo) <b>*</b></label>
                                <select name="directive_id" class="form-control" required>
                                    <option value="">-- Seleccione un directivo --</option>
                                    @foreach ($directives as $directive)
                                        <option value="{{ $directive->id }}"
                                            {{ old('directive_id') == $directive->id ? 'selected' : '' }}>
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
                                <label>Monto de la donación <b>*</b></label>
                                <input type="number" step="0.01" value="{{ old('amount') }}" name="amount"
                                    class="form-control" required>
                                @error('amount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Método --}}
                            <div class="col-md-6 mb-3">
                                <label>Método de pago <b>*</b></label>
                                <select name="method" class="form-control" required>
                                    <option value="">-- Seleccione --</option>
                                    <option value="Efectivo" {{ old('method') == 'Efectivo' ? 'selected' : '' }}>Efectivo
                                    </option>
                                    <option value="Transferencia" {{ old('method') == 'Transferencia' ? 'selected' : '' }}>
                                        Transferencia</option>
                                    <option value="Cheque" {{ old('method') == 'Cheque' ? 'selected' : '' }}>Cheque
                                    </option>
                                    <option value="Otro" {{ old('method') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('method')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Fecha --}}
                            <div class="col-md-6 mb-3">
                                <label>Fecha de donación <b>*</b></label>
                                <input type="date" value="{{ old('donation_date') }}" name="donation_date"
                                    class="form-control" required>
                                @error('donation_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Nota --}}
                            <div class="col-md-12 mb-3">
                                <label>Nota adicional</label>
                                <textarea name="note" rows="3" class="form-control" placeholder="Detalles de la donación">{{ old('note') }}</textarea>
                                @error('note')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.donaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar Donación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
