<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

// Route pour les vues d'étudiants

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('/edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('Etudiant.destroy');


// Middleware d'authentification

    Route::middleware('auth')->group(function(){
    Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/show', [ArticleController::class, 'index'])->name('article.show');
    Route::get('/create/article', [articleController::class, 'create'])->name('article.create');
    Route::post('/create/article', [articleController::class, 'store'])->name('article.store');
    Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/edit/article/{article}', [articleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [articleController::class, 'destroy'])->name('article.destroy');
});


// Route pour la vue des villes

Route::get('/villes', [VilleController::class, 'index'])->name('ville.index');


// Route pour les vues des users

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');


// Route pour la connexion et l'authentification

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');


// Route pour les langues : langue locale

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');


// Route pour les articles



// Route pour les catégories

Route::get('/create/category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');