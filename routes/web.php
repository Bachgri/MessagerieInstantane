<?php

use App\Http\Controllers\GroupeController;
use App\Http\Controllers\UserController;
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
    return view('welcomee');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('messages/{id}' , [UserController::class, 'render']);
Route::get('messages/{id}' , [App\Http\Controllers\UserController::class, 'index']);
Route::post('message/', [App\Http\Controllers\UserController::class, 'addMesssage'])->name('message');
Route::get('profiles/{id}', [App\Http\Controllers\UserController::class, 'profile']);
Route::get('messages', [UserController::class, 'messages'])->middleware(['auth'])->name('dashboard');
Route::get('remove/{id}', [UserController::class, 'remove'] );
Route::get('/', [UserController::class, 'messages'])->middleware(['auth'])->name('dashboard');
Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'] );
Route::get('/search/{id}', [\App\Http\Controllers\UserController::class, 'search']);
/*********** Les groupes ************/
Route::get('/groupes', [UserController::class, 'groupes']);
Route::get('/groupes/{id}', [GroupeController::class, 'index']);
Route::post('/saveMessage', [GroupeController::class, 'saveMessageMethode'])->name('saveMessage');


//Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
require __DIR__.'/auth.php';
 