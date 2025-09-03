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
            $numero = '50245967221'; // tu número con código de país
            $mensaje = urlencode("Hola, quiero más información sobre la Biblioteca.");
            $link = "https://wa.me/$numero?text=$mensaje";

            $bot->reply("Podés contactarnos directamente por WhatsApp: <a href='$link' target='_blank'>Abrir WhatsApp</a>");
        });


        /// mensaje por defecto si no entiende
        $botman->fallback(function ($bot) {
            $bot->reply("Lo siento, no entendí eso 😅. Podés escribir: 'horario', 'ubicación', 'servicios' o 'whatsapp' para contactarnos.");
        });

        $botman->listen();
    }
}
