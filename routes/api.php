<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [\App\Http\Controllers\PagesController::class, 'home'])->name('home');
Route::get('/search', [\App\Http\Controllers\PagesController::class, 'search'])->name('search');

Route::controller(\App\Http\Controllers\PagesController::class)->group(function () {
    Route::get('search/{search}', 'search')->name('pages.search');
});


Route::controller(\App\Http\Controllers\VideoController::class)->group(function () {
    Route::post('video', 'store')->name('video.store');
    Route::get('video/add', 'create')->name('video.create');

    Route::get('video/edit/{id}', 'edit')->name('video.edit');

    Route::put('video/update/{id}', 'update')->name('video.update');
    Route::delete('video/delete/{id}', 'delete')->name('video.delete');

    Route::get('video/{id}', 'show');
});

Route::controller(\App\Http\Controllers\CanalController::class)->group(function () {
    Route::post('canal', 'store')->name('canal.store');

    Route::get('canal/add', 'create')->name('canal.create');

    Route::get('canal', 'show')->name('canal.show');
});

Route::controller(\App\Http\Controllers\ComentarioController::class)->group(function () {
    Route::post('comentario/{id}', 'store')->name('comentario.store');
    Route::get('comentario/add/{id}', 'create')->name('comentario.create');
});


/** AUTH */

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');
});


//Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
//Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
//Route::post('logout', [\App\Http\Controllers\AuthController::class, 'destroy']);

//Route::post('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
//Route::post('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
//Route::post('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);

//Route::middleware('guest')->group(function () {
//
//
//
//
//    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//        ->name('password.request');
//
//    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//        ->name('password.email');
//
//    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//        ->name('password.reset');
//
//    Route::post('reset-password', [NewPasswordController::class, 'store'])
//        ->name('password.store');
//});
//
//Route::middleware('auth')->group(function () {
//    Route::get('verify-email', EmailVerificationPromptController::class)
//        ->name('verification.notice');
//
//    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//        ->middleware(['signed', 'throttle:6,1'])
//        ->name('verification.verify');
//
//    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//        ->middleware('throttle:6,1')
//        ->name('verification.send');
//
//    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//        ->name('password.confirm');
//
//    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//
//    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
//
//    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//        ->name('logout');
//});
