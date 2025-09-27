@extends('layouts.admin')
@section('title', 'Editar Libro')
@section('content')
<div class="row">
    <h1>Editar Libro: {{ $book->title }}</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Actualice los datos del libro</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.libros.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Título <b>*</b></label>
                                <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control" required>
                                @error('title')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="author">Autor <b>*</b></label>
                                <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control" required>
                                @error('author')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="publisher">Editorial</label>
                                <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="form-control">
                                @error('publisher')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pages">Páginas</label>
                                <input type="number" name="pages" value="{{ old('pages', $book->pages) }}" class="form-control">
                                @error('pages')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dewey_classification">Clasificación Dewey</label>
                                <input type="text" name="dewey_classification" value="{{ old('dewey_classification', $book->dewey_classification) }}" class="form-control">
                                @error('dewey_classification')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="edition">Edición</label>
                                <input type="text" name="edition" value="{{ old('edition', $book->edition) }}" class="form-control">
                                @error('edition')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="form-control">
                                @error('isbn')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="published_year">Año de Publicación</label>
                                <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" class="form-control"  min="1500" max="{{ date('Y') }}">
                                @error('published_year')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_copies">Total de Copias</label>
                                <input type="number" name="total_copies" value="{{ old('total_copies', $book->total_copies) }}" class="form-control">
                                @error('total_copies')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="available_copies">Copias Disponibles</label>
                                <input type="number" name="available_copies" value="{{ old('available_copies', $book->available_copies) }}" class="form-control">
                                @error('available_copies')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar Libro</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
