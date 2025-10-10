<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
// para en vio de enlaces y botones
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BotManController extends Controller
{
    public function handle(Request $request)
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        $config = [];
        $botman = BotManFactory::create($config);

        //preguntas y respuestas del bot
        $botman->hears('(hola|buenas|hey)', function ($bot) {
            $bot->reply('¡Hola! 👋 Soy tu asistente virtual de la Biblioteca. ¿En qué te puedo ayudar?');
        });

        $botman->hears('(horarios|horario|horarios de atención)', function ($bot) {
            $bot->reply('Nuestro horario es de Lunes a Viernes, de 8:00 a 17:00 horas.');
        });

        $botman->hears('(ubicación|dónde están|dirección)', function ($bot) {
            $bot->reply('Nos encontramos en El Tejar, Chimaltenango, Guatemala.');
        });

        $botman->hears('(servicios|qué hacen|qué ofrecen)', function ($bot) {
            $bot->reply("Ofrecemos: préstamo de libros 📚, recomendaciones literarias 📖 y talleres educativos 🏫.");
        });

        $botman->hears('adios', function (BotMan $bot) {
            $bot->reply('¡Hasta pronto! 📚');
        });

        // contacto por whatsapp
        $botman->hears('(contacto|whatsapp|hablar con alguien)', function ($bot) {
            $numero = '50250770085'; // número con código de país
            $mensaje = urlencode("Hola, quiero más información sobre la Biblioteca.");
            $link = "https://wa.me/$numero?text=$mensaje";

            $bot->reply("Podés contactarnos directamente por WhatsApp: <a href='$link' target='_blank'>Abrir WhatsApp</a>");
        });

        // 🔍 Buscar libro por nombre
        $botman->hears('tienen el libro (.*)', function (BotMan $bot, $bookName) {
            $book = \App\Models\Book::where('title', 'LIKE', "%{$bookName}%")
                ->whereNull('disabled_at')
                ->first();

            if ($book) {
                $mensaje = "✅ Sí, tenemos el libro *{$book->title}* disponible.\n";
                $mensaje .= "👤 Autor: {$book->author}\n";
                if ($book->publisher) $mensaje .= "🏢 Editorial: {$book->publisher}\n";
                if ($book->ubication) $mensaje .= "📍 Ubicación: {$book->ubication}\n";

                $bot->reply($mensaje);
            } else {
                $bot->reply("😔 No encontré un libro con ese nombre o el libro no está disponible actualmente.");
            }
        });

        // 🧑‍💼 Buscar libros por autor
        $botman->hears('(libros del autor|tienen libros de|autor) (.*)', function (BotMan $bot, $match, $author) {
            $books = \App\Models\Book::where('author', 'LIKE', "%{$author}%")
                ->whereNull('disabled_at')
                ->take(5)
                ->get();

            if ($books->isEmpty()) {
                $bot->reply("😔 No encontré libros del autor *{$author}*.");
            } else {
                $bot->reply("📚 Estos son algunos libros del autor *{$author}*:");
                foreach ($books as $book) {
                    $bot->reply("• *{$book->title}* (" . ($book->publisher ? $book->publisher : 'Editorial desconocida') . ")");
                }
            }
         });


// 🔢 Buscar libros por clasificación Dewey
$botman->hears('(libros en la clasificación|clasificación dewey|dewey) (.*)', function (BotMan $bot, $match, $dewey) {
    $books = \App\Models\Book::where('dewey', 'LIKE', "{$dewey}%")
        ->whereNull('disabled_at')
        ->take(5)
        ->get();

    if ($books->isEmpty()) {
        $bot->reply("😔 No encontré libros en la clasificación Dewey *{$dewey}*.");
    } else {
        $bot->reply("📘 Libros en la clasificación Dewey *{$dewey}*:");
        foreach ($books as $book) {
            $bot->reply("• *{$book->title}* – Autor: {$book->author}");
        }
    }
});

         //pregunta por eventos
        $botman->hears('(qué eventos|eventos disponibles|próximos eventos|eventos)', function (BotMan $bot) {
            $events = \App\Models\Event::whereDate('start', '>=', now())
                ->orderBy('start', 'asc')
                ->take(5)
                ->get();

            if ($events->isEmpty()) {
                $bot->reply("Por ahora no hay eventos programados 😅.");
            } else {
                $bot->reply("📅 Estos son los próximos eventos:");
                foreach ($events as $event) {
                    $fecha = \Carbon\Carbon::parse($event->start)->format('d/m/Y');
                    $descripcion = $event->description ?? 'Sin descripción';
                    $bot->reply("• *{$event->title}*\n🗓 Fecha: {$fecha}\n📝 {$descripcion}");
                }
            }
        });

        /// mensaje por defecto si no entiende
        $botman->fallback(function ($bot) {
            $bot->reply("Lo siento, no entendí eso 😅. Podés escribir: 'horario', 'ubicación', 'servicios' o 'whatsapp' para contactarnos.");
        });

        $botman->listen();
    }
}
