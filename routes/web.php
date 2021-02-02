<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\EditalController;

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
    return view('welcome');
});
Route::middleware(['auth', 'verified'])->group(function () {
   
Route::get('/painel/home', [PainelController::class,'dashboard'])->name('painel.home');
//Route::view('/painel/home', 'home')->name('home');
});

Route::resource('edital',EditalController::class, ['except' => [
     'destroy', 'show'
]]);