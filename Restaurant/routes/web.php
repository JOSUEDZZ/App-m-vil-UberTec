<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController; 
use App\Http\Middleware\VerifyCsrfToken;
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

Route::get('/Usuarios/insertar', 
[RestaurantController::class, 'insertarUsuario']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/platillos',
[RestaurantController::class,'platillos']);

Route::get('/platillos/{id}',
[RestaurantController::class,'platillo']);

Route::get('/platillos/categoria/{categoria}',
[RestaurantController::class,'categoria']);

Route::get('/Usuarios', 
[RestaurantController::class, 'Usuario']);

Route::post('/Usuarios/insertar', 
[RestaurantController::class, 'insertarUsuario'])
->withoutMiddleware(VerifyCsrfToken::class);

Route::post('/Usuarios/iniciarsesion', 
[RestaurantController::class, 'iniciarSesion'])
->withoutMiddleware(VerifyCsrfToken::class);

Route::get('/Usuarios/iniciarsesion', 
[RestaurantController::class, 'iniciarSesion']);



 //RUTA PARA LAS NOTIFICACIONES
Route::get('/Notificar', 
[RestaurantController::class, 'Notificacion']);

Route::get('/Notificar/obtener/{idUsuario}', 
[RestaurantController::class, 'obtenerEstadoNotificacion']);
 
Route::post('/Notificar/InsertarNotificacion', 
[RestaurantController::class, 'enviarNotificacion'])
->withoutMiddleware(VerifyCsrfToken::class);

Route::get('/Notificar/InsertarNotificacion', 
[RestaurantController::class, 'enviarNotificacion']);


Route::get('/subirFoto',
[RestaurantController::class, 'subirFoto']);

Route::post('/subirFoto',
    [RestaurantController::class, 'subirFoto'])
->withoutMiddleware(VerifyCsrfToken::class);