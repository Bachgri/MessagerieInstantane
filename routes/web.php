<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\UserController;
use App\Models\Groupe;
use App\Models\Invitation;
use App\Models\Membre;
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
Route::get('/tests/{id}', function($id){
    $invits = Invitation::where('userId', '=', auth()->user()->id)->select('groupId')->get();
    $membr  = Membre::where('userId', '=', auth()->user()->id)->get();
    $groupes = Groupe::whereNotIn('groupes.id',$invits)->get();
    return view('test', compact('groupes'));
});


Route::get('/', function () { return view('welcomee');});
  
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');
Route::get('/registre', [RegisteredUserController::class, 'create']);
Route::get('messages/{id}' , [UserController::class, 'render']);
Route::get('messages/{id}' , [App\Http\Controllers\UserController::class, 'index']); 
Route::post('message/', [App\Http\Controllers\UserController::class, 'addMesssage'])->name('message');
Route::get('profiles/{id}', [App\Http\Controllers\UserController::class, 'profile']);
Route::get('messages', [UserController::class, 'messages'])->middleware(['auth'])->name('dashboard');
Route::get('remove/{id}', [UserController::class, 'remove'] );
Route::get('/', [UserController::class, 'messages'])->middleware(['auth'])->name('dashboard');
Route::get('logout', [App\Http\Controllers\UserController::class, 'logout'] );
Route::get('/search/{id}', [\App\Http\Controllers\UserController::class, 'search']);
Route::post('/editeProfile',[\App\Http\Controllers\UserController::class, 'editeProfile'])->name('editProfile');
Route::get('/userprofile/{id}', [UserController::class, 'ViewProfile']);
/*********** Les groupes ************/
Route::get('/groupes', [UserController::class, 'groupes']);
Route::get('/groupes/{id}', [GroupeController::class, 'index']);
Route::post('/saveMessage', [GroupeController::class, 'saveMessageMethode'])->name('saveMessage');
Route::get('/groupe/sendInvit/{id}', [GroupeController::class, 'sendInvit']);
Route::get('/removeUserfrom/{idUser}/{idGroupe}', [GroupeController::class, 'removefromGroupe']);
Route::get('/groupesCreateOne', [GroupeController::class, 'create'])->name('newOne');
Route::post('/storeGroup', [GroupeController::class, 'storeGroupeFunc'])->name('storeGroupe');
Route::get('/invitation', [GroupeController::class, 'mesInvitation'] );
Route::get('/refuse/{idInvit}', [GroupeController::class, 'removeInvit'] )->name('RefuseInvit');
Route::get('/accept/{idInvit}/de/{idGroupe}', [GroupeController::class, 'AcceptInvit'] );
Route::get('/addMembreInvite/{IDI}/from/{IDG}', [GroupeController::class, 'addMembreInvit'] );
Route::get('/removeInvite/{IDI}/from/{IDG}', [GroupeController::class, 'removeMembreInvit'] );
Route::get('/invit/{idu}/to/{idg}', [GroupeController::class, 'invitUserToGroupe']);
Route::get('/searchGAvec/{id}', [\App\Http\Controllers\GroupeController::class, 'search']);
Route::post('edit', [\App\Http\Controllers\GroupeController::class, 'editGroupe'])->name('editGroupe');



require __DIR__.'/auth.php';
 