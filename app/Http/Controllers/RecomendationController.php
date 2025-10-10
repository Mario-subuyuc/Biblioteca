<?php

namespace App\Http\Controllers;

use App\Models\Recomendation;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecomendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Clasificaciones Dewey
        $clasificaciones = [
            '000' => 'Enciclopedias, diccionarios y obras de consulta general.',
            '100' => 'Filosofía y Psicología: Pensamiento crítico, ética, mente y comportamiento humano.',
            '200' => 'Religión: Textos sagrados, espiritualidad y estudios religiosos.',
            '300' => 'Estudios Sociales: Política, economía, derecho y sociología.',
            '370' => 'Educación: Enseñanza, métodos pedagógicos y aprendizaje.',
            '400' => 'Lenguas e Idiomas: Gramática, traducción y estudios lingüísticos.',
            '500' => 'Ciencias Naturales: Matemáticas, biología, física, química y astronomía.',
            '600' => 'Tecnología: Avances científicos aplicados, innovación y computación.',
            '610' => 'Salud: Medicina, cuidado personal y bienestar físico.',
            '630' => 'Agricultura: Producción agrícola, ganadería y recursos naturales.',
            '640' => 'Cocina y Manualidades: Artes culinarias, recetas y creatividad práctica.',
            '700' => 'Arte, Deporte y Música: Pintura, danza, literatura, deporte y expresión artística.',
            '800' => 'Literatura:',
            '900' => 'Geografia e historia:',
            '920' => 'Biografia:',
            'Infantil' => 'Libros infantiles y juveniles',
        ];

        $recomendaciones = [];

        foreach ($clasificaciones as $codigo => $descripcion) {

            $topLibros = \App\Models\Loan::select('books.*', DB::raw('COUNT(loans.id) as total'))
                ->join('books', 'loans.book_id', '=', 'books.id')
                ->when(strtolower($codigo) === 'infantil', function ($query) {
                    $query->where('books.dewey', 'LIKE', 'Infantil%');
                }, function ($query) use ($codigo) {
                    $query->where('books.dewey', 'LIKE', $codigo . '%');
                })
                ->groupBy('books.id')
                ->orderByDesc('total')
                ->take(3)
                ->get();

            /*$topLibros = \App\Models\Loan::select('books.id', DB::raw('COUNT(*) as total'))
                ->join('books', 'loans.book_id', '=', 'books.id')
                ->when(strtolower($codigo) === 'infantil', function ($query) {
                    // nota: aquí usamos strtolower() para coincidir sin importar mayúsculas/minúsculas
                    $query->where('books.dewey', 'LIKE', 'Infantil%');
                }, function ($query) use ($codigo) {
                    $query->where('books.dewey', 'LIKE', $codigo . '%');
                })
                ->groupBy('books.id')
                ->orderByDesc('total')
                ->take(3)
                ->with('book')
                ->get();*/


            /* $topLibros = \App\Models\Loan::with('book')
                ->whereHas('book', function ($query) use ($codigo) {
                    if (strtolower($codigo) === 'infantil') {
                        $query->where('dewey', 'LIKE', 'Infantil%');
                    } else {
                        $query->where('dewey', 'LIKE', $codigo . '%');
                    }
                })
                ->select('book_id', DB::raw('COUNT(*) as total'))
                ->groupBy('book_id')
                ->orderByDesc('total')
                ->take(3)
                ->get();*/
            $recomendaciones[$codigo] = [
                'descripcion' => $descripcion,
                'libros' => $topLibros
            ];
        }

        return view('admin.recomendaciones.index', compact('recomendaciones'));
    }

}
