<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Loan;

class AdminController extends Controller
{
    public function index()
    {
        $total_visitantes = Visitor::count();

        $year = Carbon::now()->year;

        // Contar visitantes por mes del año actual
        $visitasPorMes = Visitor::select(
            DB::raw('MONTH(visit_date) as mes'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('visit_date', $year)
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes'); // pluck(total, mes) para usar mes como clave

        // Inicializar todos los meses en 0 si no hay visitas
        $datos = [];
        for ($i = 1; $i <= 12; $i++) {
            $datos[$i] = $visitasPorMes->has($i) ? $visitasPorMes[$i] : 0;
        }

        //datos sobre libros
        $total_libros = Book::count(); // todos los libros
        $libros_disponibles = Book::whereDoesntHave('loans', function ($query) {
            $query->whereIn('status', ['activo', 'atrasado']); // excluir libros activos o atrasados
        })->count();
        $libros_prestados = Loan::where('status', 'activo')->count(); // préstamos activos
        $libros_atrasados = Loan::where('status', 'atrasado')->count(); // préstamos atrasados
        // Enviar $datos a la vista
        return view('admin.index', compact(
            'total_visitantes',
            'datos',
            'total_libros',
            'libros_disponibles',
            'libros_prestados',
            'libros_atrasados'
        ));
    }
}
