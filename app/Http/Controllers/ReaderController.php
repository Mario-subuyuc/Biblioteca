<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Models\User;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::with('user')->paginate(10);
    return view('admin.lectores.index', compact('readers'));
    }

    public function create()
    {
        $users = User::doesntHave('reader')->get();
        return view('readers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:readers,user_id',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'dpi' => 'required|unique:readers,dpi',
            'occupation' => 'nullable|string',
            'ethnicity' => 'nullable|string',
        ]);

        Reader::create($request->all());

        return redirect()->route('readers.index')->with('success', 'Reader created successfully.');
    }

    public function show(Reader $reader)
    {
        return view('readers.show', compact('reader'));
    }

    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, Reader $reader)
    {
        $request->validate([
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'dpi' => 'required|unique:readers,dpi,' . $reader->id,
            'occupation' => 'nullable|string',
            'ethnicity' => 'nullable|string',
        ]);

        $reader->update($request->all());

        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    public function destroy(Reader $reader)
    {
        $reader->delete();
        return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
