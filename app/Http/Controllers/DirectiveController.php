<?php

namespace App\Http\Controllers;
use App\Models\Directive;
use App\Models\User;

use Illuminate\Http\Request;

class DirectiveController extends Controller
{
    public function index()
    {
        $directives = Directive::with('user')->paginate(10);
        return view('admin.directores.index', compact('directives'));
    }

        public function create()
    {
        $users = User::all(); // Seleccionar usuario a asociar
        return view('admin.directives.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id|unique:directives,user_id',
            'department' => 'nullable|string|max:191',
        ]);

        Directive::create($request->all());

        return redirect()->route('admin.directives.index')->with('success', 'Directive created successfully.');
    }

    public function show(Directive $directive)
    {
        $directive->load('user');
        return view('admin.directives.show', compact('directive'));
    }

    public function edit(Directive $directive)
    {
        $users = User::all();
        return view('admin.directives.edit', compact('directive', 'users'));
    }

    public function update(Request $request, Directive $directive)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id|unique:directives,user_id,' . $directive->id,
            'department' => 'nullable|string|max:191',
        ]);

        $directive->update($request->all());

        return redirect()->route('admin.directives.index')->with('success', 'Directive updated successfully.');
    }

    public function destroy(Directive $directive)
    {
        $directive->delete();
        return redirect()->route('admin.directives.index')->with('success', 'Directive deleted successfully.');
    }

}
