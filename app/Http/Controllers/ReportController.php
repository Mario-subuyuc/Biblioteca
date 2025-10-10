<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Visitor;
use App\Models\Computer;
use App\Models\Event;
use App\Models\Loan;
use App\Models\Directive;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //correcccion de fechas
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];
        $mes = $meses[date('n')]; // n devuelve el número del mes sin ceros
        $anio = date('Y');

        // Fechas del mes actual
        $inicioMes = Carbon::now()->startOfMonth()->toDateString();
        $finMes = Carbon::now()->endOfMonth()->toDateString();

        // =======================
        // ASISTENCIA
        // =======================
        $visitas = Visitor::whereBetween('visit_date', [$inicioMes, $finMes])->get();

        $asistencia = [
            '0-12' => ['F' => 0, 'M' => 0],
            '13-21' => ['F' => 0, 'M' => 0],
            '22+' => ['F' => 0, 'M' => 0],
        ];

        foreach ($visitas as $v) {
            if ($v->birth_year) {
                $edad = Carbon::now()->year - $v->birth_year;
            } else {
                $edad = null;
            }

            if ($edad !== null) {
                if ($edad <= 12) {
                    $rango = '0-12';
                } elseif ($edad <= 21) {
                    $rango = '13-21';
                } else {
                    $rango = '22+';
                }

                if (strtolower($v->gender) === 'femenino' || strtolower($v->gender) === 'f') {
                    $asistencia[$rango]['F']++;
                } elseif (strtolower($v->gender) === 'masculino' || strtolower($v->gender) === 'm') {
                    $asistencia[$rango]['M']++;
                }
            }
        }

        // =======================
        // COMPUTADORAS
        // =======================
        $usos = Computer::whereBetween('created_at', [$inicioMes, $finMes])->get();

        $mapaPropositos = [
            'juegos' => 'juegos',
            'teclear documentos' => 'teclear documentos',
            'consultar información' => 'consulta de información',
            'estudiar' => 'consulta de información', // si quieres agrupar "estudiar" con "consulta de información"
            'redes sociales' => 'chat y redes sociales',
            'revisar correo' => 'correo',
            'rasberry' => 'raspberry', // corregir error tipográfico
            'raspberry' => 'raspberry',
            'otro' => 'otro',
        ];

        $propositos = array_unique(array_values($mapaPropositos));

        $computadoras = [
            '0-12' => [
                'M' => ['sin_internet' => array_fill_keys($propositos, 0), 'con_internet' => array_fill_keys($propositos, 0)],
                'F' => ['sin_internet' => array_fill_keys($propositos, 0), 'con_internet' => array_fill_keys($propositos, 0)]
            ],
            '13-21' => [
                'M' => ['sin_internet' => array_fill_keys($propositos, 0), 'con_internet' => array_fill_keys($propositos, 0)],
                'F' => ['sin_internet' => array_fill_keys($propositos, 0), 'con_internet' => array_fill_keys($propositos, 0)]
            ],
            '22+' => [
                'M' => ['sin_internet' => array_fill_keys($propositos, 0), 'con_internet' => array_fill_keys($propositos, 0)],
                'F' => ['sin_internet' => array_fill_keys($propositos, 0), 'con_internet' => array_fill_keys($propositos, 0)]
            ],
        ];

        foreach ($usos as $uso) {
            $edad = Carbon::parse($uso->birth_date)->age;

            if ($edad <= 12) {
                $rango = '0-12';
            } elseif ($edad <= 21) {
                $rango = '13-21';
            } else {
                $rango = '22+';
            }

            $genero = strtolower($uso->gender) === 'femenino' ? 'F' : 'M';
            $internet = $uso->internet_access ? 'con_internet' : 'sin_internet';

            $propositoKey = strtolower(trim($uso->usage_purpose));

            if (isset($mapaPropositos[$propositoKey])) {
                $proposito = $mapaPropositos[$propositoKey];
                $computadoras[$rango][$genero][$internet][$proposito]++;
            }
        }

        // =======================
        // PRÉSTAMOS DE LIBROS
        // =======================
        $loans = Loan::with('book')
            ->whereBetween('loan_date', [$inicioMes, $finMes])
            ->whereIn('status', ['activo', 'devuelto'])
            ->get();

        $totalPrestados = $loans->count();

        // Inicializar categorías
        $tipos = [
            'tareas' => 0,
            'novelas' => 0,
            'otros' => 0,
        ];

        foreach ($loans as $loan) {
            $book = $loan->book;

            if (!$book) continue;

            $dewey = strtolower($book->dewey ?? ''); // asegurarse de no tener null

            // Clasificación simple por palabras clave en Dewey
            if (str_contains($dewey, 'tarea') || str_contains($dewey, 'estudio')) {
                $tipos['tareas']++;
            } elseif (str_contains($dewey, 'novela') || str_contains($dewey, 'cuento') || str_contains($dewey, 'poesía')) {
                $tipos['novelas']++;
            } else {
                $tipos['otros']++;
            }
        }

        // =======================
        // ACTIVIDADES
        // =======================
        $actividades = Event::with('users')
            ->whereBetween('start', [$inicioMes, $finMes])
            ->get();
        $participacion = [];
        $totalHombres = 0;
        $totalMujeres = 0;

        foreach ($actividades as $actividad) {
            $hombres = $actividad->users()->where('gender', 'masculino')->count();
            $mujeres = $actividad->users()->where('gender', 'femenino')->count();

            $participacion[] = [
                'title' => $actividad->title,
                'hombres' => $hombres,
                'mujeres' => $mujeres,
                'total' => $hombres + $mujeres,
            ];

            $totalHombres += $hombres;
            $totalMujeres += $mujeres;
        }

        $totalesActividades = [
            'hombres' => $totalHombres,
            'mujeres' => $totalMujeres,
            'total' => $totalHombres + $totalMujeres,
        ];


        // Datos para la vista
        $prestamoLibros = [
            'servicio_domicilio' => 'SI',
            'total_prestados' => $totalPrestados,
            'tipos' => $tipos
        ];

        //para voluntarios

        $voluntarios = Directive::with('user')
            ->whereBetween('updated_at', [$inicioMes, $finMes])
            ->get();

        $report = [];

        foreach ($voluntarios as $v) {
            if (!$v->user) continue;

            $nombre = $v->user->name;
            $department = $v->department ?? 'N/A';
            $horas = intval($v->hours ?? 0);

            if (isset($report[$nombre])) {
                $report[$nombre]['hours'] += $horas; // sumar horas
            } else {
                $report[$nombre] = [
                    'department' => $department,
                    'hours' => $horas
                ];
            }
        }

        //dd($computadoras);

        return view('admin.reportes.index', compact(
            'asistencia',
            'computadoras',
            'prestamoLibros',
            'totalesActividades',
            'participacion',
            'report',
            'mes',
            'anio'
        ));
    }
}
