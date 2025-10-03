<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_visitantes = Visitor::count();

        return view('admin.index', compact(
            'total_visitantes'));
    }
}
