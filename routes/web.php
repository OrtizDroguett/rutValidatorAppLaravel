<?php

use App\Http\Controllers\PerfilController;
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
    return view('home');
})->name('home');

Route::group(['prefix'=>'perfil'], function(){
    Route::get('/', [PerfilController::class,'index'])->name('perfil.index');
    Route::post('/store',[PerfilController::class,'store']);
    Route::get('/rellenarTabla',[PerfilController::class,'rellenarTabla']);
});
