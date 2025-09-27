<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwofactorCodeController;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;

//==============================
//rutas de landing page
//==============================
//raiz de proyecto
Route::get('/', function () {   return view('index');});
//paginas para sobre nosotros, servicios, testimonios, blog y contacto
Route::get('/about', function () {    return view('about');});
Route::get('/blog', function () {    return view('blog');});
Route::get('/blog-details', function () {    return view('blog-details');});
Route::get('/contact', function () {    return view('contact');});
Route::get('/services', function () {    return view('services');});



//=========================================
//rutas de doble factor de autentificacion
//=========================================
Route::get('verify', [TwofactorCodeController::class, 'verify'])->name('verify');
Route::get('verify/resend', [TwofactorCodeController::class, 'resend'])->name('verify.resend');
Route::post('verify', [TwofactorCodeController::class, 'verifyPost'])->name('verify.post');



//=====================
//ruta para el chatbot
//=====================
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);



//===========================================
//vistas para el dashboard principal/layoupt
//===========================================
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(['auth', 'two.factor']);



//====================================================
//vitas para dashboard principal
//====================================================
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','two.factor'])->name('dashboard');



//====================================================
// Ruta para editar el perfil del usuario autenticado
//====================================================
Route::get('/usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update');



//====================================================
// rutas para la gestion de usuarios
//====================================================
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



//====================================================
// rutas para la gestion de visitantes
//====================================================
Route::get('/admin/visitantes', [App\Http\Controllers\VisitorController::class, 'index'])->name('admin.visitantes.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de visitantes panel crear
Route::get('/admin/visitantes/create', [App\Http\Controllers\VisitorController::class, 'create'])->name('admin.visitantes.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/visitantes/create', [App\Http\Controllers\VisitorController::class, 'store'])->name('admin.visitantes.store')->middleware(['auth', 'two.factor']);
// Ruta para ver visitante por id
Route::get('/admin/visitantes/{id}', [App\Http\Controllers\VisitorController::class, 'show'])->name('admin.visitantes.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar visitante
Route::get('/admin/visitantes/{id}/edit', [App\Http\Controllers\VisitorController::class, 'edit'])->name('admin.visitantes.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de visitante
Route::put('/admin/visitantes/{id}', [App\Http\Controllers\VisitorController::class, 'update'])->name('admin.visitantes.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar visitante
Route::get('/admin/visitantes/{id}/confirm-delete', [App\Http\Controllers\VisitorController::class, 'confirmDelete'])->name('admin.visitantes.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/visitantes/{id}', [App\Http\Controllers\VisitorController::class, 'destroy'])->name('admin.visitantes.destroy')->middleware(['auth', 'two.factor']);

//====================================================
// rutas para la gestion de libros
//====================================================
// Ruta para inventario/libros
Route::get('admin/libros', [App\Http\Controllers\BookController::class, 'index'])->name('admin.libros.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de libros panel crear
Route::get('admin/libros/create', [App\Http\Controllers\BookController::class, 'create'])->name('admin.libros.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('admin/libros/create', [App\Http\Controllers\BookController::class, 'store'])->name('admin.libros.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('admin/libros/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('admin.libros.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar
Route::get('admin/libros/{id}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('admin.libros.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de libro
Route::put('admin/libros/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('admin.libros.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar
Route::get('admin/libros/{id}/confirm-delete', [App\Http\Controllers\BookController::class, 'confirmDelete'])->name('admin.libros.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('admin/libros/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('admin.libros.destroy')->middleware(['auth', 'two.factor']);

//====================================================
// rutas para la gestion de materiales
//====================================================
// Ruta para inventario/materiales
Route::get('admin/materiales', [App\Http\Controllers\MaterialController::class, 'index'])->name('admin.materiales.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de materiales panel crear
Route::get('admin/materiales/create', [App\Http\Controllers\MaterialController::class, 'create'])->name('admin.materiales.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('admin/materiales/create', [App\Http\Controllers\MaterialController::class, 'store'])->name('admin.materiales.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('admin/materiales/{id}', [App\Http\Controllers\MaterialController::class, 'show'])->name('admin.materiales.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar usuario
Route::get('admin/materiales/{id}/edit', [App\Http\Controllers\MaterialController::class, 'edit'])->name('admin.materiales.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de usuario
Route::put('admin/materiales/{id}', [App\Http\Controllers\MaterialController::class, 'update'])->name('admin.materiales.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar usuario
Route::get('admin/materiales/{id}/confirm-delete', [App\Http\Controllers\MaterialController::class, 'confirmDelete'])->name('admin.materiales.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('admin/materiales/{id}', [App\Http\Controllers\MaterialController::class, 'destroy'])->name('admin.materiales.destroy')->middleware(['auth', 'two.factor']);

//====================================================
// rutas para la gestion de eventos
//====================================================
// Ruta para admin/eventos
Route::get('/admin/eventos', [App\Http\Controllers\VisitorController::class, 'index'])->name('admin.eventos.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de eventos panel crear
Route::get('/admin/eventos/create', [App\Http\Controllers\VisitorController::class, 'create'])->name('admin.eventos.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/eventos/create', [App\Http\Controllers\VisitorController::class, 'store'])->name('admin.eventos.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('/admin/eventos/{id}', [App\Http\Controllers\VisitorController::class, 'show'])->name('admin.eventos.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar usuario
Route::get('/admin/eventos/{id}/edit', [App\Http\Controllers\VisitorController::class, 'edit'])->name('admin.eventos.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de usuario
Route::put('/admin/eventos/{id}', [App\Http\Controllers\VisitorController::class, 'update'])->name('admin.eventos.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar usuario
Route::get('/admin/eventos/{id}/confirm-delete', [App\Http\Controllers\VisitorController::class, 'confirmDelete'])->name('admin.eventos.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/eventos/{id}', [App\Http\Controllers\VisitorController::class, 'destroy'])->name('admin.eventos.destroy')->middleware(['auth', 'two.factor']);

//====================================================
//rutas para el perfil de usuario autenticado critico
//====================================================
Route::middleware('auth','two.factor')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//========================================================
//rutas AJAX -- valida para obtener los usuarios activos
//========================================================
Route::get('/admin/sesiones', [App\Http\Controllers\SessionController::class, 'index'])->name('admin.sesiones.index')->middleware(['auth', 'verified', 'two.factor']);
Route::get('/admin/sesiones/activos', [App\Http\Controllers\SessionController::class, 'obtenerUsuariosActivos'])->name('admin.sesiones.obtener')->middleware(['auth', 'verified', 'two.factor']);


