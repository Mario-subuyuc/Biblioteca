<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwofactorCodeController;
use Illuminate\Support\Facades\Route;

//rutas de landing page
//pagina principal
Route::get('/', function () {   return view('index');});
//paginas para sobre nosotros, servicios, testimonios, blog y contacto
Route::get('/about', function () {    return view('about');});
Route::get('/services', function () {    return view('services');});
Route::get('/testimonials', function () {    return view('testimonials');});
Route::get('/blog', function () {    return view('blog');});
Route::get('/contact', function () {    return view('contact');});

//rutas de doble factor de autentificacion
Route::get('verify', [TwofactorCodeController::class, 'verify'])->name('verify');
Route::get('verify/resend', [TwofactorCodeController::class, 'resend'])->name('verify.resend');
Route::post('verify', [TwofactorCodeController::class, 'verifyPost'])->name('verify.post');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','two.factor'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
