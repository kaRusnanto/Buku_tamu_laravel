<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\Buku_TamuController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {return view('welcome');});
Auth::routes();

Route::get('/home',[HomeController::class, 'index']);

Route::resource('/tamu',TamuController::class);

Route::resource('/buku_tamu',Buku_TamuController::class);

Route::resource('jabatan', JabatanController::class);

Route::get('buku_tamupdf', [Buku_TamuController::class, 'buku_tamuPDF']);

Route::get('tamupdf', [TamuController::class, 'tamuPDF']);

Route::get('bukutamucsv', [Buku_TamuController::class, 'buku_tamucsv']);

Route::get('tamucsv', [TamuController::class, 'tamucsv']);

// // form jabatan
// Route::get('/form_jabatan', function () {
//     return view('jabatan.form'); 
// });