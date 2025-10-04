@extends('layouts.admin')
@section('title', 'Detalle del Libro')
@section('content')
<div class="row">
    <h1>Detalle del Libro: {{ $book->title }}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Detalles del libro (solo lectura)</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" value="{{ $book->title }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Autor</label>
                                <input type="text" value="{{ $book->author }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Editorial</label>
                                <input type="text" value="{{ $book->publisher ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Clasificación Dewey</label>
                                <input type="text" value="{{ $book->dewey ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" value="{{ $book->isbn ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <input type="text" value="{{ $book->ubication ?? '—' }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Creado en</label>
                                <input type="text" value="{{ $book->created_at }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Última actualización</label>
                                <input type="text" value="{{ $book->updated_at }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">Volver a la lista</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
