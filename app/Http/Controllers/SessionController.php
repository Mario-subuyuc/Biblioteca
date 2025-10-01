<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class SessionController extends Controller
{
    public function index()
    {
            // Usuarios por día (últimos 30 días)
    $usuariosPorDia = DB::table('sessions')
        ->selectRaw('DATE(FROM_UNIXTIME(last_activity)) as fecha, COUNT(*) as cantidad')
        ->where('last_activity', '>=', now()->subDays(30)->timestamp)
        ->groupBy('fecha')
        ->orderBy('fecha', 'desc')
        ->get();

    // Usuarios por semana (últimas 12 semanas)
    $usuariosPorSemana = DB::table('sessions')
        ->selectRaw('YEAR(FROM_UNIXTIME(last_activity)) as anio, WEEK(FROM_UNIXTIME(last_activity), 1) as semana, COUNT(*) as cantidad')
        ->where('last_activity', '>=', now()->subWeeks(12)->timestamp)
        ->groupBy('anio', 'semana')
        ->orderBy('anio', 'desc')
        ->orderBy('semana', 'desc')
        ->get();

    // Usuarios por mes (últimos 12 meses)
    $usuariosPorMes = DB::table('sessions')
        ->selectRaw("DATE_FORMAT(FROM_UNIXTIME(last_activity), '%Y-%m') as mes, COUNT(*) as cantidad")
        ->where('last_activity', '>=', now()->subMonths(12)->timestamp)
        ->groupBy('mes')
        ->orderBy('mes', 'desc')
        ->get();



        // Se obtiene el tiempo actual menos
        $limiteTiempo = Carbon::now()->subSeconds(60)->timestamp;

        // Consultar los usuarios activos en la tabla sessions
        $usuarios = DB::table('sessions')
            ->where('last_activity', '>=', $limiteTiempo)
            ->join('users', 'sessions.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email', 'sessions.last_activity', 'sessions.ip_address', 'sessions.user_agent')
            ->get();
        return view('admin.sesiones.index', compact('usuarios','usuariosPorDia', 'usuariosPorSemana', 'usuariosPorMes'));
    }

    // Función para obtener los usuarios activos para la petición AJAX
    public function obtenerUsuariosActivos()
    {
        $limiteTiempo = Carbon::now()->subSeconds(60)->timestamp;

        $usuarios = DB::table('sessions')
            ->where('last_activity', '>=', $limiteTiempo)
            ->join('users', 'sessions.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email', 'sessions.last_activity', 'sessions.ip_address', 'sessions.user_agent')
            ->get();

        // Si la solicitud es por AJAX, devolver en formato JSON
        return response()->json($usuarios);
    }

}
