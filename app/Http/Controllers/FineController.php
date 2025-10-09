<?php

namespace App\Http\Controllers;

use App\Models\fine;
use App\Models\Reader;
use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Traer todos los loans con status pendiente
        $loans = Loan::with(['reader.user', 'book'])
        ->where('status', 'atrasado')
        ->get()
        ->map(function ($loan) {
            $loan->diasAtraso = \Carbon\Carbon::parse($loan->return_date)->diffInDays(now(), false);
            return $loan;
        });

        return view('admin.multas.index', compact('loans'));
    }
}
