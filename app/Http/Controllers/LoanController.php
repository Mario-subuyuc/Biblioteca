<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use App\Models\Reader;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['reader.user', 'book'])->latest()->get();

        $myLoans = Loan::with('book')
            ->whereHas('reader', fn($q) => $q->where('user_id', auth()->id()))
            ->latest()
            ->get();

        $books = Book::whereNull('deleted_at') // solo libros que no están eliminados
        ->whereDoesntHave('loans', function ($q) {
        $q->whereIn('status', ['activo', 'atrasado']); // excluir libros en préstamo activo o atrasado
        })->orderBy('title', 'asc')->get(); // orden alfabético ascendente (A → Z)

        return view('admin.prestamos.index', compact('loans', 'myLoans', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:loan_date',
        ]);

        $reader = auth()->user()->reader;

        if (!$reader) {
            return back()->with('mensaje', 'No tienes un perfil de lector asignado.')->with('icono', 'error');
        }

        // Verificar que el libro no esté prestado actualmente
        $exists = Loan::where('book_id', $request->book_id)
            ->whereIn('status', ['activo', 'atrasado'])
            ->exists();

        if ($exists) {
            return back()->with('mensaje', 'El libro ya está prestado actualmente.')->with('icono', 'error');
        }

        Loan::create([
            'reader_id' => $reader->id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => 'activo',
        ]);

        return back()->with('mensaje', 'Préstamo registrado correctamente.')->with('icono', 'success');
    }

    public function cancel(Loan $loan)
    {
        if ($loan->reader_id != auth()->user()->reader->id) {
            return back()->with('mensaje', 'No puedes cancelar este préstamo.')->with('icono', 'error');
        }

        $loan->update(['status' => 'cancelado']);

        return back()->with('mensaje', 'Préstamo cancelado correctamente.')->with('icono', 'success');
    }

    public function updateState(Request $request, Loan $loan)
    {
        $request->validate([
            'status' => 'required|in:activo,devuelto,atrasado,cancelado',
        ]);

        $loan->update(['status' => $request->status]);

        return back()->with('mensaje', 'Estado del préstamo actualizado correctamente.')->with('icono', 'success');
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'return_date' => 'required|date|after:loan_date',
        ]);

        $loan->update(['return_date' => $request->return_date]);

        return back()->with('mensaje', 'Fecha de devolución actualizada correctamente.')->with('icono', 'success');
    }
}
