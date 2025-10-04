<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        // Enviar $datos a la vista
        return view('admin.index', compact(
            'total_visitantes',
            'datos'
        ));
    }
}
