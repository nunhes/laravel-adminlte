<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Sistema;
use App\Http\Middleware\ValidarSession;
use Illuminate\Support\Facades\Route;

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
    return view('login.login')->with('error','');
})->middleware('handle');

Route::post('/login',[Login::class,'login']);
Route::post('/cerrar_sesion',[Login::class,'cerrar_session']);

Route::get('/dashboard',[Sistema::class,'dashboard'])->middleware('nossesion');

Route::get('/session',function(){
    echo var_dump(session()->get('usuario_logueado'));
});