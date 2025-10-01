<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\User;

class DonationController extends Controller
{
     public function index()
    {
        $donations = Donation::with(['reader', 'directive'])->paginate(10);
        return view('admin.donaciones.index', compact('donations'));
    }

    public function create()
    {
        $readers = User::role('reader')->get();       // usando Spatie roles
        $directives = User::role('directive')->get();
        return view('admin.donations.create', compact('readers', 'directives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:users,id',
            'directive_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
            'method' => 'required|string|max:50',
            'donation_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        Donation::create($request->all());

        return redirect()->route('admin.donations.index')
                         ->with('success', 'Donation registered successfully!');
    }
}
