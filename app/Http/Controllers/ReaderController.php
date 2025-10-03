<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ReaderController extends Controller
{
    // Listar todos los lectores
    public function index()
    {
        $readers = Reader::whereHas('user')->with('user')->get(); // Trae todos los registros
        return view('admin.lectores.index', compact('readers'));
    }

    // Mostrar formulario de creación
    public function create()
    {

        $ethnicities = ['Maya', 'Ladina', 'Garífuna', 'Xinca', 'Otro']; // Opciones de etnia

        return view('admin.lectores.create', compact('ethnicities'));
    }

    // Guardar nuevo lector
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'in:masculino,femenino,otro'],

            // Datos de lector
            'birth_date' => ['nullable', 'date'],
            'dpi' => ['required', 'unique:readers,dpi'],
            'occupation' => ['nullable', 'string'],
            'ethnicity' => ['nullable', 'in:maya,ladina,garifuna,xinca,mestizo,otro'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        Reader::create([
            'user_id' => $user->id,
            'birth_date' => $request->birth_date,
            'dpi' => $request->dpi,
            'occupation' => $request->occupation,
            'ethnicity' => $request->ethnicity,
        ]);

        return redirect()->route('admin.lectores.index')
            ->with('mensaje', 'Lector registrado correctamente.')
            ->with('icono', 'success');
    }

    // Mostrar detalles de un lector
    public function show($id)
    {
        $lector = Reader::findOrFail($id);
        return view('admin.lectores.show', compact('lector'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $lector = Reader::with('user')->findOrFail($id);
        return view('admin.lectores.edit', compact('lector'));
    }

    public function update(Request $request, $id)
    {
        $lector = Reader::with('user')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $lector->user_id,
            'password' => 'nullable|confirmed|min:8',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:masculino,femenino,otro',
            'dpi' => 'required|unique:readers,dpi,' . $lector->id,
            'occupation' => 'nullable|string',
            'ethnicity' => 'nullable|in:maya,ladina,garifuna,xinca,mestizo,otro',
        ]);

        // Actualizar usuario
        $lector->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => $request->password ? Hash::make($request->password) : $lector->user->password,
        ]);

        // Actualizar lector
        $lector->update($request->only('birth_date', 'dpi', 'occupation', 'ethnicity'));

        return redirect()->route('admin.lectores.index')
            ->with('mensaje', 'Lector actualizado correctamente.')
            ->with('icono', 'success');
    }

}
