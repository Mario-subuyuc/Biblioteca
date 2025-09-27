@extends('layouts.admin')
@section('title', 'Detalle del Libro')
@section('content')
<div class="row">
    <h1>Detalle del Libro: {{ $book->title }}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Detalles del libro</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" value="{{ $book->title }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="author">Autor</label>
                                <input type="text" value="{{ $book->author }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="publisher">Editorial</label>
                                <input type="text" value="{{ $book->publisher }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pages">Páginas</label>
                                <input type="number" value="{{ $book->pages }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dewey_classification">Clasificación Dewey</label>
                                <input type="text" value="{{ $book->dewey_classification }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="edition">Edición</label>
                                <input type="text" value="{{ $book->edition }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" value="{{ $book->isbn }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="published_year">Año de Publicación</label>
                                <input type="number" value="{{ $book->published_year }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_copies">Total de Copias</label>
                                <input type="number" value="{{ $book->total_copies }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="available_copies">Copias Disponibles</label>
                                <input type="number" value="{{ $book->available_copies }}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="created_at">Creado en</label>
                                <input type="text" value="{{ $book->created_at }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="updated_at">Última actualización</label>
                                <input type="text" value="{{ $book->updated_at }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">Volver a la lista</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
