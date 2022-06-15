<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaController;
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
    return view('auth.login');
});

/*Route::get('/empleado', function () {
    return view('empleado.Index');
});

Route::get('/empleado/create',[GaleriaController::class,'create']);
*/

Route::resource('galeria',GaleriaController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [GaleriaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
     
    Route::get('/home', [GaleriaController::class, 'index'])->name('home');

});