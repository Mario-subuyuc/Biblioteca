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
                                <label for="dewey">Clasificación Dewey</label>
                                <input type="text" name="dewey" class="form-control" value="{{ old('dewey') }}">
                                @error('dewey') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" name="isbn" class="form-control" value="{{ old('isbn') }}">
                                @error('isbn') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="ubication">Ubicación</label>
                                <input type="text" name="ubication" class="form-control" value="{{ old('ubication') }}">
                                @error('ubication') <small style="color:red">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">


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
