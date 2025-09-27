<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Mostrar todos los libros
    public function index()
    {
        $books = Book::all();
        return view('admin.libros.index', compact('books'));
    }

    // Formulario para crear un libro
    public function create()
    {
        return view('admin.libros.create');
    }

    // Guardar nuevo libro
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'pages' => 'nullable|integer|min:1',
            'dewey_classification' => 'nullable|string|max:50',
            'edition' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|unique:books,isbn',
            'total_copies' => 'required|integer|min:1',
            'available_copies' => 'required|integer|min:0',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.libros.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Libro creado correctamente');
    }

    // Mostrar un libro específico
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.libros.show', compact('book'));
    }

    // Formulario para editar un libro
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.libros.edit', compact('book'));
    }

    // Actualizar libro
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'pages' => 'nullable|integer|min:1',
            'dewey_classification' => 'nullable|string|max:50',
            'edition' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|unique:books,isbn,' . $book->id,
            'total_copies' => 'required|integer|min:1',
            'available_copies' => 'required|integer|min:0',
        ]);

        $book->update($request->all());

        return redirect()->route('admin.libros.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Libro actualizado correctamente');
    }

    // Confirmar eliminación
    public function confirmDelete($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.libros.delete', compact('book'));
    }

    // Eliminar libro
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect()->route('admin.libros.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Libro eliminado correctamente');
    }
}
