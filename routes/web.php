<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwofactorCodeController;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;

//rutas de landing page
//pagina principal
Route::get('/', function () {   return view('index');});
//paginas para sobre nosotros, servicios, testimonios, blog y contacto
Route::get('/about', function () {    return view('about');});
Route::get('/blog', function () {    return view('blog');});
Route::get('/blog-details', function () {    return view('blog-details');});
Route::get('/contact', function () {    return view('contact');});
Route::get('/services', function () {    return view('services');});




//rutas de doble factor de autentificacion
Route::get('verify', [TwofactorCodeController::class, 'verify'])->name('verify');
Route::get('verify/resend', [TwofactorCodeController::class, 'resend'])->name('verify.resend');
Route::post('verify', [TwofactorCodeController::class, 'verifyPost'])->name('verify.post');

//ruta para el chatbot
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

//vistas para el dashboard principal
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(['auth', 'two.factor']);

//vitas para admin/usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware(['auth', 'two.factor']);


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','two.factor'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

