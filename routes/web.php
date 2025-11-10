<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\CategoryController;

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

// Route pour les vues d'étudiants

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/create/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('/edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('Etudiant.destroy');

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{articles}', [ArticleController::class, 'indexArticle'])->name('article.indexArticle');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article-connect/{article}', [ArticleController::class, 'showConnect'])->name('article.show-connect');
//Route::get('/article-pdf/{article}', [ArticleController::class, 'pdf'])->name('article.pdf');
Route::get('/article-pdf/{article}', [ArticleController::class, 'pdf'])->name('article.pdf');
Route::get('/completed/article/{completed}', [ArticleController::class, 'completed'])->name('article.completed');
Route::get('/query', [ArticleController::class, 'query']);


Route::middleware('auth')->group(function(){
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/create/article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    //Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/edit/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
    

    Route::resource('/categories', CategoryController::class);
    // php artisan route:list
    //   GET|HEAD        categories ............. categories.index › CategoryController@index  
    //   POST            categories ............. categories.store › CategoryController@store  
    //   GET|HEAD        categories/create ...... categories.create › CategoryController@create  
    //   GET|HEAD        categories/{category} .. categories.show › CategoryController@show  
    //   PUT|PATCH       categories/{category} .. categories.update › CategoryController@update  
    //   DELETE          categories/{category} .. categories.destroy › CategoryController@destroy  
    //   GET|HEAD        categories/{category}/edit .. categories.edit › CategoryController@edit

});

Route::middleware('auth')->get('/dashboard', [UserController::class, 'indexUser'])->name('user.dashboard');
Route::get('/registration', [EtudiantController::class, 'create'])->name('etudiant.create');
    Route::post('/registration', [EtudiantController::class, 'store'])->name('etudiant.store');

    //Route::get('/registration', [UserController::class, 'create'])->name('user.create')->middleware('can:create-users');

//Route::middleware(['role:Admin'])->group(function () {
    //Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('auth');
    
//});

Route::get('/password/forgot', [UserController::class, 'forgot'])->name('user.forgot');
Route::post('/password/forgot', [UserController::class, 'email'])->name('user.email');
Route::get('/password/reset/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
Route::put('/password/reset/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('/categories', CategoryController::class);
Route::get('/create/category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');