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

//vitas para dashboard principal
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','two.factor'])->name('dashboard');



// Ruta para admin/usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de usuarios panel crear
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar usuario
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de usuario
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar usuario
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware(['auth', 'two.factor']);


// Ruta para admin/visitantes
Route::get('/admin/visitantes', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.visitantes.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de visitantes panel crear
Route::get('/admin/visitantes/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.visitantes.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/visitantes/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.visitantes.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('/admin/visitantes/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.visitantes.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar usuario
Route::get('/admin/visitantes/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.visitantes.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de usuario
Route::put('/admin/visitantes/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.visitantes.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar usuario
Route::get('/admin/visitantes/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.visitantes.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/visitantes/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.visitantes.destroy')->middleware(['auth', 'two.factor']);

//rutas para el perfil de usuario autenticado critico
Route::middleware('auth','two.factor')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//rutas AJAX -- valida para obtener los usuarios activos
Route::get('/admin/sesiones', [App\Http\Controllers\SessionController::class, 'index'])->name('admin.sesiones.index')->middleware(['auth', 'verified', 'two.factor']);
Route::get('/admin/sesiones/activos', [App\Http\Controllers\SessionController::class, 'obtenerUsuariosActivos'])->name('admin.sesiones.obtener')->middleware(['auth', 'verified', 'two.factor']);


