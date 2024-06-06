<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


//
//require __DIR__.'/auth.php';
//
//// Route::get('/', function () {
////     return view('welcome');
//// });
//
//// Route::get('/dashboard', function () {
////     return view('dashboard');
//// })->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//
//Route::get('/', [\App\Http\Controllers\PagesController::class, 'home'])->name('home');
//Route::get('/search', [\App\Http\Controllers\PagesController::class, 'search'])->name('search');
//
// Route::controller(\App\Http\Controllers\PagesController::class)->group(function () {
//     Route::get('search/{search}', 'search')->name('pages.search');
// });
//
//
// Route::controller(\App\Http\Controllers\VideoController::class)->group(function () {
//     Route::post('video', 'store')->name('video.store');
//     Route::get('video/add', 'create')->name('video.create');
//
//     Route::get('video/edit/{id}', 'edit')->name('video.edit');
//
//     Route::put('video/update/{id}', 'update')->name('video.update');
//     Route::delete('video/delete/{id}', 'delete')->name('video.delete');
//
////     Route::get('video/update/{id}', 'update')->name('video.update');
////     Route::get('video/delete/{id}', 'delete')->name('video.delete');
//
//     Route::get('video/{id}', 'show')->name('video.show');
// });
//
//Route::controller(\App\Http\Controllers\CanalController::class)->group(function () {
//    Route::post('canal', 'store')->name('canal.store');
//
//    Route::get('canal/add', 'create')->name('canal.create');
//
//    Route::get('canal', 'show')->name('canal.show');
//});
//
//Route::controller(\App\Http\Controllers\ComentarioController::class)->group(function () {
//    Route::post('comentario/{id}', 'store')->name('comentario.store');
//    Route::get('comentario/add/{id}', 'create')->name('comentario.create');
//});
//
























// Route::controller(\App\Http\Controllers\PagesController::class)->group(function () {
//     Route::get('search/{search}', 'search')->name('pages.search');
//     // Route::get('search/{search}', 'search')->name('pages.search');

// //     // Route::get('peticiones/index', 'index')->name('peticiones.index');
// //     // Route::get('mispeticiones', 'listMine')->name('peticiones.mine');
// //     // Route::get('peticionesfirmadas', 'peticionesFirmadas')->name('peticiones.peticionesfirmadas');
// //     // Route::get('peticiones/{id}', 'show')->name('peticiones.show');
// //     // Route::get('peticion/add', 'create')->name('peticiones.create');
// //     // Route::post('peticion', 'store')->name('peticiones.store');
// //     // Route::delete('peticiones/{id}', 'delete')->name('peticiones.delete');
// //     // Route::put('peticiones/{id}', 'update')->name('peticiones.update');
// //     // Route::post('peticiones/firmar/{id}', 'firmar')->name('peticiones.firmar');

// //     // Route::get('peticiones/desfirmar/{id}', 'desfirmar')->name('peticiones.desfirmar');

// //     // Route::get('peticiones/edit/{id}', 'update')->name('peticiones.edit');
// });
