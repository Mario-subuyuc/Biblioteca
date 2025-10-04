<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // Mostrar todos los libros
    public function index()
    {
        $books = Book::with(['disabledBy', 'enabledBy'])->withTrashed()->get();// Incluye libros eliminados con SoftDeletes
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
            'dewey' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|unique:books,isbn'
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
            'dewey' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|unique:books,isbn,' . $book->id,
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
        $book = Book::findOrFail($id);
        $book->delete(); // SoftDelete aplicado al libro
        $book->disabled_at = now();
        $book->disabled_by = auth()->id();
        $book->save();

        return redirect()->route('admin.libros.index')
            ->with('icono', 'success')
            ->with('mensaje', 'Libro eliminado correctamente');
    }

    //habilitar libro
    public function enable($id)
    {
        $book = Book::withTrashed()->findOrFail($id);

        $book->disabled_at = null;
        $book->disabled_by = null;
        $book->enabled_at = now();
        $book->enabled_by = auth()->id();

        // Si estaba softdeleted, restaurarlo
        if ($book->trashed()) {
            $book->restore();
        }

        $book->save();

        return back()->with('icono', 'success')->with('mensaje', 'Libro habilitado nuevamente');
    }
}
