<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    // Vista del calendario
    public function indexx()
    {
        $events = Event::with('users')->get();
        $users  = User::all();
        return view('admin.eventos.index', compact('events', 'users')); // tu blade actual
    }
    public function index()
    {
        return response()->json(Event::all());
    }

    // Guardar evento desde el modal
    public function store(Request $request)
    {
        $event = Event::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Evento creado con éxito.',
            'event' => $event
        ]);
    }
    //actualizar evento
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Evento actualizado con éxito',
            'event' => $event
        ]);
    }
    // Eliminar evento
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evento eliminado con éxito'
        ]);
    }


    public function assignUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $event = Event::findOrFail($id);
        $event->users()->syncWithoutDetaching([$request->user_id]);

        return back()->with('success', 'Usuario asignado correctamente al evento.');
    }

    public function removeUser(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $event = Event::findOrFail($id);
        $event->users()->detach($request->user_id);

        return back()->with('success', 'Usuario eliminado correctamente del evento.');
    }
    // Función para la vista del blog con eventos landing
    public function landingBlog()
    {

        $tableEvents = Event::paginate(7)->through(function ($event) {
            return [
                'title'       => $event->title,
                // Para la tabla: fecha y hora legibles
                'start'       => $event->start
                    ? \Carbon\Carbon::parse($event->start)->format('d M, Y H:i')
                    : null,
                'end'         => $event->end
                    ? \Carbon\Carbon::parse($event->end)->format('d M, Y H:i')
                    : ($event->start
                        ? \Carbon\Carbon::parse($event->start)->format('d M, Y H:i')
                        : null),
                'description' => $event->description ?? 'Sin descripción',
            ];
        });

        $events = Event::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->start ? \Carbon\Carbon::parse($event->start)->format('Y-m-d') : null,
                'end'   => $event->end ? \Carbon\Carbon::parse($event->end)->format('Y-m-d') : ($event->start ? \Carbon\Carbon::parse($event->start)->format('Y-m-d') : null),
                'url'   => '#', // aquí puedes poner la ruta a la vista de detalle del evento
                'backgroundColor' => $event->color ?? '#3788d8', // color del evento, default azul
                'borderColor'     => $event->color ?? '#3788d8',
                'extendedProps'   => [
                    'description' => $event->description, // descripción extra
                ],
            ];
        });

        return view('blog', compact('events', 'tableEvents'));
    }
}
