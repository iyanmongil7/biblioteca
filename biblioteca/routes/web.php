<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LibroController;
use App\Http\Controllers\ContactaController;
use App\Mail\ContactaMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['can:admin.list_users']], function(){
    Route::get('/admin',[\App\Http\Controllers\Admin\AdminController::class,'index']);
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/libros', LibroController::class);
    Route::get('admin/vistaPrestamos',[\App\Http\Controllers\Admin\LibroController::class,'verprestamo']);
    Route::get('admin/devolver/{id}',[\App\Http\Controllers\Admin\LibroController::class,'devolver'])->name('devolver');
    Route::get('admin/confirmarEliminar/{id}',[\App\Http\Controllers\Admin\LibroController::class,'confirmarEliminar'])->name('confirmarEliminar');
});
Route::get('/devolverPremium/{id}',[\App\Http\Controllers\LibroController::class,'devolverPremium'])->name('devolverPremium');
Route::get('/pagado', [\App\Http\Controllers\LibroController::class, 'pagado'])->name('pagado');
Route::get('/pagar', [\App\Http\Controllers\LibroController::class, 'pagar'])->name('pagar');
Route::get('/admin/verprestamos', [\App\Http\Controllers\Admin\LibroController::class, 'verprestamo'])->name('verprestamo');
Route::get('/librosUser', [\App\Http\Controllers\LibroController::class, 'index'])->name('librosUser');
Route::get('/prestamos', [\App\Http\Controllers\LibroController::class, 'prestamos'])->name('prestamos');
Route::get('/libroslistas', [\App\Http\Controllers\LibroController::class, 'listalibros'])->name('libroslistas');
Route::get('/catalogolibros', [\App\Http\Controllers\LibroController::class, 'catalogolibros']);
Route::get('/catalogolibros/{id}', [\App\Http\Controllers\LibroController::class, 'verLibro'])->name('verLibro');
Route::get('/crearreserva/{id}', [\App\Http\Controllers\LibroController::class, 'crearPrestamo'])->name('crearReserva');
Route::get('/borrarreserva/{id}', [\App\Http\Controllers\LibroController::class, 'borrarreserva'])->name('borrarreserva');

Route::get('contacta',[ContactaController::class,'index'])->name('contacta.index');
Route::post('contacta',[ContactaController::class,'store'])->name('contacta.store');

/*Route::get('contacta', function (){
    $correo=new ContactaMail;
    Mail::to('iyanmg49@educastur.es')->send($correo);
    return("mensaje enviado");
});*/


Auth::routes();
