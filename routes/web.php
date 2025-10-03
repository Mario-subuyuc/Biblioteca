<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwofactorCodeController;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

//==============================
//rutas de landing page
//==============================
//raiz de proyecto
Route::get('/', function () {   return view('index');});
//paginas para sobre nosotros, servicios, testimonios, blog y contacto
Route::get('/about', function () {    return view('about');});
//Route::get('/blog', function () {    return view('blog');});
Route::get('/blog', [App\Http\Controllers\EventController::class, 'landingBlog'])->name('blog');
//Route::get('/blog-details', function () {    return view('blog-details');});
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


//====================================================
//vitas para dashboard principal
//====================================================
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])
    ->middleware(['auth','two.factor'])
    ->name('dashboard');

//===========================================
//vistas para el dashboard principal/layoupt
//===========================================
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware(['auth', 'two.factor']);



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
// rutas para la gestion de lectores
//====================================================
// Ruta para admin/lectores
Route::get('/admin/lectores', [App\Http\Controllers\ReaderController::class, 'index'])->name('admin.lectores.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de lectores panel crear
Route::get('/admin/lectores/create', [App\Http\Controllers\ReaderController::class, 'create'])->name('admin.lectores.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/lectores/create', [App\Http\Controllers\ReaderController::class, 'store'])->name('admin.lectores.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('/admin/lectores/{id}', [App\Http\Controllers\ReaderController::class, 'show'])->name('admin.lectores.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar usuario
Route::get('/admin/lectores/{id}/edit', [App\Http\Controllers\ReaderController::class, 'edit'])->name('admin.lectores.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de usuario
Route::put('/admin/lectores/{id}', [App\Http\Controllers\ReaderController::class, 'update'])->name('admin.lectores.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar usuario
Route::get('/admin/lectores/{id}/confirm-delete', [App\Http\Controllers\ReaderController::class, 'confirmDelete'])->name('admin.lectores.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/lectores/{id}', [App\Http\Controllers\ReaderController::class, 'destroy'])->name('admin.lectores.destroy')->middleware(['auth', 'two.factor']);

//====================================================
// rutas para la gestion de directores
//====================================================
// Ruta para admin/directores
Route::get('/admin/directores', [App\Http\Controllers\DirectiveController::class, 'index'])->name('admin.directores.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de directores panel crear
Route::get('/admin/directores/create', [App\Http\Controllers\DirectiveController::class, 'create'])->name('admin.directores.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/directores/create', [App\Http\Controllers\DirectiveController::class, 'store'])->name('admin.directores.store')->middleware(['auth', 'two.factor']);
// Ruta para ver usuario por id
Route::get('/admin/directores/{id}', [App\Http\Controllers\DirectiveController::class, 'show'])->name('admin.directores.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar usuario
Route::get('/admin/directores/{id}/edit', [App\Http\Controllers\DirectiveController::class, 'edit'])->name('admin.directores.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de usuario
Route::put('/admin/directores/{id}', [App\Http\Controllers\DirectiveController::class, 'update'])->name('admin.directores.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar usuario
Route::get('/admin/directores/{id}/confirm-delete', [App\Http\Controllers\DirectiveController::class, 'confirmDelete'])->name('admin.directores.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/directores/{id}', [App\Http\Controllers\DirectiveController::class, 'destroy'])->name('admin.directores.destroy')->middleware(['auth', 'two.factor']);


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
// rutas para la gestion de donaciones
//====================================================
Route::get('/admin/donaciones', [App\Http\Controllers\DonationController::class, 'index'])->name('admin.donaciones.index')->middleware(['auth', 'two.factor']);
// Ruta para gestión de donaciones panel crear
Route::get('/admin/donaciones/create', [App\Http\Controllers\DonationController::class, 'create'])->name('admin.donaciones.create')->middleware(['auth', 'two.factor']);
// Ruta para gestión de envio de formulario crear
Route::post('/admin/donaciones/create', [App\Http\Controllers\DonationController::class, 'store'])->name('admin.donaciones.store')->middleware(['auth', 'two.factor']);
// Ruta para ver visitante por id
Route::get('/admin/donaciones/{id}', [App\Http\Controllers\DonationController::class, 'show'])->name('admin.donaciones.show')->middleware(['auth', 'two.factor']);
// Ruta para ver editar visitante
Route::get('/admin/donaciones/{id}/edit', [App\Http\Controllers\DonationController::class, 'edit'])->name('admin.donaciones.edit')->middleware(['auth', 'two.factor']);
// Ruta para enviar la actualizacion de visitante
Route::put('/admin/donaciones/{id}', [App\Http\Controllers\DonationController::class, 'update'])->name('admin.donaciones.update')->middleware(['auth', 'two.factor']);
// Ruta para ver eliminar visitante
Route::get('/admin/donaciones/{id}/confirm-delete', [App\Http\Controllers\DonationController::class, 'confirmDelete'])->name('admin.donaciones.confirmDelete')->middleware(['auth', 'two.factor']);
// Ruta para mandar la eliminacion
Route::delete('/admin/donaciones/{id}', [App\Http\Controllers\DonationController::class, 'destroy'])->name('admin.donaciones.destroy')->middleware(['auth', 'two.factor']);

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
//ruta para ver todos los eventos en admin
Route::get('admin/eventos', [App\Http\Controllers\EventController::class, 'indexx'])->name('admin.Eventos.index')->middleware(['auth', 'two.factor']);
//ruta abierta para ver todos los eventos
Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->middleware(['auth', 'two.factor']);
// Crear y actualizar ya existentes
Route::post('events/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.events.store')->middleware(['auth', 'two.factor']);
Route::post('events/{id}/update', [App\Http\Controllers\EventController::class, 'update'])->name('admin.events.update')->middleware(['auth', 'two.factor']);
// Nueva ruta para eliminar
Route::delete('events/{id}/delete', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.events.destroy');
// Asignar usuario a evento
Route::post('events/{id}/assign-user', [App\Http\Controllers\EventController::class, 'assignUser'])->name('events.assignUser')->middleware(['auth', 'two.factor']);
// Eliminar usuario de evento
Route::delete('events/{id}/remove-user', [App\Http\Controllers\EventController::class, 'removeUser'])->name('events.removeUser')->middleware(['auth', 'two.factor']);

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
Route::get('/admin/sesiones', [App\Http\Controllers\SessionController::class, 'index'])->name('admin.sesiones.index')->middleware(['auth', 'two.factor']);
Route::get('/admin/sesiones/activos', [App\Http\Controllers\SessionController::class, 'obtenerUsuariosActivos'])->name('admin.sesiones.obtener')->middleware(['auth', 'two.factor']);
//ruta para obtener usuarios resumen metricas
Route::get('/admin/resumen-usuarios', [App\Http\Controllers\SessionController::class, 'resumenUsuarios'])->name('admin.resumen.usuarios')->middleware(['auth', 'two.factor']);
