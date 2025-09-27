@extends('layouts.admin')
@section('title', 'Eliminar Libro')
@section('content')
<div class="row">
    <h1>Eliminar Libro: {{ $book->title }}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar este libro?</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/libros/'.$book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

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
                                <input type="text" value="{{ $book->publisher }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Páginas</label>
                                <input type="number" value="{{ $book->pages }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Clasificación Dewey</label>
                                <input type="text" value="{{ $book->dewey_classification }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Edición</label>
                                <input type="text" value="{{ $book->edition }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" value="{{ $book->isbn }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Año de Publicación</label>
                                <input type="number" value="{{ $book->published_year }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total de Copias</label>
                                <input type="number" value="{{ $book->total_copies }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Copias Disponibles</label>
                                <input type="number" value="{{ $book->available_copies }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Creado en</label>
                                <input type="text" value="{{ $book->created_at }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger">Eliminar Libro</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
