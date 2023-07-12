<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\NotificacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegistroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get(
    '/dashboard',
    [UsuarioController::class, 'index']
)->middleware(['auth', 'verified'])->name('usuario.index');
Route::get(
    '/show',
    [UsuarioController::class, 'show']
)->middleware(['auth', 'verified'])->name('usuario.show');
Route::get(
    '/create',
    [UsuarioController::class, 'create']
)->middleware(['auth', 'verified'])->name('usuario.create');
Route::post(
    '/create',
    [UsuarioController::class, 'store']
)->middleware(['auth', 'verified']);
Route::get(
    '/mostrar',
    [UsuarioController::class, 'shows']
)->middleware(['auth', 'verified'])->name('usuario.shows');
Route::get('usuarios/{usuarioId}/registros', [UsuarioController::class, 'ver'])
    ->name('user-registros');

//Registros
Route::get(
    '/registros/index',
    [RegistroController::class, 'index']
)->middleware(['auth', 'verified'])->name('registro.index');
Route::get(
    '/registros/show',
    [RegistroController::class, 'show']
)->middleware(['auth', 'verified'])->name('registro.show');
Route::get('/registros/{registro}/edit', [RegistroController::class, 'edit'])->middleware(['auth', 'verified'])->name('registros.edit');

//Funcionarios
Route::get('/funcionarios/show', [FuncionarioController::class, 'show'])->middleware(['auth', 'verified'])->name('funcionarios.show');
Route::get('/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit'])->middleware(['auth', 'verified'])->name('funcionarios.edit');

//Notificaciones
Route::get('/notificaciones',  NotificacionController::class)->middleware(['auth', 'verified'])->name('notificaciones');

//Usuario-ver registros


//Perfin usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
