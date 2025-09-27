@extends('layouts.admin')
@section('title', 'Registrar Libro')
@section('content')
<div class="row">
    <h1>Registro de un nuevo libro</h1>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del libro a guardar</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.libros.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Título</label><b>*</b>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                                @error('title') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="author">Autor</label><b>*</b>
                                <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
                                @error('author') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="publisher">Editorial</label>
                                <input type="text" name="publisher" class="form-control" value="{{ old('publisher') }}">
                                @error('publisher') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pages">Páginas</label>
                                <input type="number" name="pages" class="form-control" value="{{ old('pages') }}" min="1">
                                @error('pages') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dewey_classification">Clasificación Dewey</label>
                                <input type="text" name="dewey_classification" class="form-control" value="{{ old('dewey_classification') }}">
                                @error('dewey_classification') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="edition">Edición</label>
                                <input type="text" name="edition" class="form-control" value="{{ old('edition') }}">
                                @error('edition') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" name="isbn" class="form-control" value="{{ old('isbn') }}">
                                @error('isbn') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="published_year">Año de Publicación</label>
                                <input type="number" name="published_year" class="form-control" value="{{ old('published_year') }}" min="0">
                                @error('published_year') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_copies">Total de Copias</label><b>*</b>
                                <input type="number" name="total_copies" class="form-control" value="{{ old('total_copies') }}" min="1" required>
                                @error('total_copies') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="available_copies">Copias Disponibles</label><b>*</b>
                                <input type="number" name="available_copies" class="form-control" value="{{ old('available_copies') }}" min="0" required>
                                @error('available_copies') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('admin.libros.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Registrar Libro</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
