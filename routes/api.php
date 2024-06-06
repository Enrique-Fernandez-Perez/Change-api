<?php

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

//Route::post('/register2', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
});


//Route::get('/', [\App\Http\Controllers\PagesController::class, 'home'])->name('home');
Route::get('/search', [\App\Http\Controllers\PagesController::class, 'search']);

Route::controller(\App\Http\Controllers\PagesController::class)->group(function () {
    Route::get('search/{search}', 'search');
});


Route::controller(\App\Http\Controllers\VideosController::class)->group(function () {
    Route::get('videos', 'index');

    Route::post('video', 'store');
    Route::get('video/add', 'create');

    Route::get('video/edit/{id}', 'edit');

    Route::put('video/update/{id}', 'update');
    Route::delete('video/delete/{id}', 'delete');

    Route::get('video/{id}', 'show');
});

Route::controller(\App\Http\Controllers\CanalController::class)->group(function () {
    Route::post('canal', 'store');

    Route::get('canal/add', 'create');

    Route::get('canal', 'show');
});

Route::controller(\App\Http\Controllers\ComentarioController::class)->group(function () {
    Route::post('comentario/{id}', 'store');
    Route::get('comentario/add/{id}', 'create');
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Http\Controllers\VideosController::class)->group(function () {
    Route::get('videos', 'index');

    Route::post('video', 'store')->name('video.store');
    Route::get('video/add', 'create')->name('video.create');

    Route::get('video/edit/{id}', 'edit')->name('video.edit');

    Route::put('video/update/{id}', 'update')->name('video.update');
    Route::delete('video/delete/{id}', 'delete')->name('video.delete');

//     Route::get('video/update/{id}', 'update')->name('video.update');
//     Route::get('video/delete/{id}', 'delete')->name('video.delete');

    Route::get('video/{id}', 'show')->name('video.show');
});


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');
});*/
