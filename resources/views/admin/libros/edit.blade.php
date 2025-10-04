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
                                <label for="dewey">Clasificación Dewey</label>
                                <input type="text" name="dewey" value="{{ old('dewey', $book->dewey) }}" class="form-control">
                                @error('dewey')
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ubication">Ubicación</label>
                                <input type="text" name="ubication" value="{{ old('ubication', $book->ubication) }}" class="form-control">
                                @error('ubication')
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
