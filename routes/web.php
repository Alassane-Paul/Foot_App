<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ButController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/connexion', [PagesController::class, 'login'])->name('login');
    Route::post('/connexion', [AuthController::class, 'login'])->name('login');
    Route::get('/password/reset', [PagesController::class, 'passwordReset'])->name('pass.reset');
    Route::post('/password/reset', [AuthController::class, 'passwordReset'])->name('pass.reset');
    Route::post('/password/change', [AuthController::class, 'passwordChange'])->name('pass.change');
    

    Route::get('equipe', [EquipeController::class, 'index'])->name('equipe.liste');
    Route::get('equipe/detail/{id}', [EquipeController::class, 'show'])->name('equipe.detail');
    
    Route::get('/equipe/joueurs/{id}', [JoueurController::class, 'index'])->name('equipe.joueurs');
    Route::get('/joueur/show/{id}', [JoueurController::class, 'show'])->name('joueur.detail');
    
    Route::get('/', [MatchController::class, 'index'])->name('match.liste');
    Route::get('/match/show/{id}', [MatchController::class, 'show'])->name('match.detail');
    
    Route::get('/buts', [ButController::class, 'index'])->name('but.liste');
    Route::get('/buts/detail/{id}', [ButController::class, 'show'])->name('but.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/inscription', [PagesController::class, 'register'])->name('register');
    Route::post('/inscription', [AuthController::class, 'register'])->name('register');
    Route::get('/deconnexion', [AuthController::class, 'logout'])->name('logout');

    Route::get('equipe/add', [EquipeController::class, 'create'])->name('equipe.creation');
    Route::post('equipe/save', [EquipeController::class, 'store'])->name('equipe.save');
    Route::get('equipe/update/{id}', [EquipeController::class, 'edit'])->name('equipe.update');
    Route::put('equipe/update/{id}', [EquipeController::class, 'update'])->name('equipe.update');
    Route::delete('equipe/destroy/{id}', [EquipeController::class, 'destroy'])->name('equipe.destroy');
    
    Route::get('/joueur/show/{id}', [JoueurController::class, 'show'])->name('joueur.detail');
    Route::get('/joueur/identification/{equipeid}', [JoueurController::class, 'create'])->name('joueur.creation');
    Route::post('/joueur/identification', [JoueurController::class, 'store'])->name('joueur.identifier');
    Route::get('/joueur/update/{id}', [JoueurController::class, 'edit'])->name('joueur.update');
    Route::put('/joueur/update/{id}', [JoueurController::class, 'update'])->name('joueur.update');
    Route::delete('/joueur/destroy/{id}', [JoueurController::class, 'destroy'])->name('joueur.destroy');

    Route::get('/match/creation', [MatchController::class, 'create'])->name('match.create');
    Route::post('/match/creation', [MatchController::class, 'store'])->name('match.store');
    Route::get('/match/update/{id}', [MatchController::class, 'edit'])->name('match.update');
    Route::put('/match/update/{id}', [MatchController::class, 'update'])->name('match.update');
    Route::delete('/match/destroy/{id}', [MatchController::class, 'destroy'])->name('match.destroy');

    Route::get('/buts/create/{id}', [ButController::class, 'create'])->name('but.create');
    Route::post('/buts', [ButController::class, 'store'])->name('but.store');
    Route::get('/buts/edit/{id}', [ButController::class, 'edit'])->name('but.edit');
    Route::put('/buts/update/{id}', [ButController::class, 'update'])->name('but.update');
    Route::delete('/buts/destroy/{id}', [ButController::class, 'destroy'])->name('but.destroy');

});