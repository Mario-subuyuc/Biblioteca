<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Book;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with([
            'reader.user' => fn($q) => $q->withTrashed(),
            'book' => fn($q) => $q->withTrashed()
        ])->latest()->get();

        $books = Book::whereNull('disabled_at')->get();

        $myReservations = Reservation::with('book')
            ->where('reader_id', auth()->user()->reader->id ?? null)
            ->latest()
            ->get();

        return view('admin.reservaciones.index', compact('reservations', 'books', 'myReservations'));
    }

    public function store(Request $request)
    {
        $hoy = \Carbon\Carbon::today();
        $fechaReserva = \Carbon\Carbon::parse($request->date);
        // Validar fecha menor a hoy
        if ($fechaReserva->lt($hoy)) {
            return redirect()->back()
                ->with('mensaje', 'La fecha de reserva no puede ser anterior a hoy.')
                ->with('icono', 'error');
        }
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $reader = auth()->user()->reader;

        if (!$reader) {
            return redirect()->back()
                ->with('mensaje', 'No tienes un perfil de lector asignado.')
                ->with('icono', 'error');
        }





        // Validar domingo
        if ($fechaReserva->isSunday()) {
            return redirect()->back()
                ->with('mensaje', 'No se pueden hacer reservas los domingos.')
                ->with('icono', 'error');
        }

        // Validar días suspendidos por administrador
        $suspendedDays = ['2025-10-12', '2025-12-25']; // ejemplo, luego puede venir de DB
        if (in_array($fechaReserva->toDateString(), $suspendedDays)) {
            return redirect()->back()
                ->with('mensaje', 'Ese día el servicio de reservas está suspendido.')
                ->with('icono', 'error');
        }

        // Verificar si el libro ya está reservado para esa fecha
        $existing = Reservation::where('book_id', $request->book_id)
            ->where('state', 'pendiente')
            ->where('date', $fechaReserva->toDateString())
            ->first();

        if ($existing) {
            return redirect()->back()
                ->with('mensaje', 'El libro ya está reservado por otro usuario para esa fecha.')
                ->with('icono', 'error');
        }

        // Crear reserva
        Reservation::create([
            'reader_id' => $reader->id,
            'book_id' => $request->book_id,
            'date' => $fechaReserva->toDateString(),
            'state' => 'pendiente',
        ]);

        return redirect()->back()
            ->with('mensaje', 'Reserva creada correctamente.')
            ->with('icono', 'success');
    }


    public function cancel(Reservation $reservation)
    {
        // Validar que el usuario es dueño de la reserva
        if ($reservation->reader_id != auth()->user()->reader->id) {
            return redirect()->back()
                ->with('mensaje', 'No tienes permiso para cancelar esta reserva.')
                ->with('icono', 'error');
        }

        // Cambiar estado a cancelada
        $reservation->update([
            'state' => 'cancelada',
        ]);

        return redirect()->back()
            ->with('mensaje', 'Reserva cancelada correctamente.')
            ->with('icono', 'success');
    }

    public function updateState(Request $request, Reservation $reservation)
    {
        $request->validate([
            'state' => 'required|in:pendiente,confirmada,cancelada',
        ]);

        $reservation->update([
            'state' => $request->state
        ]);

        return redirect()->back()
            ->with('mensaje', 'Estado de la reserva actualizado correctamente.')
            ->with('icono', 'success');
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
        ]);

        $reservation->update([
            'date' => $request->date,
        ]);

        return redirect()->back()->with('mensaje', 'Reserva actualizada correctamente')->with('icono', 'success');
    }
}
