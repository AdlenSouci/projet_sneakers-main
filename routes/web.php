<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\produitController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\registerController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\basketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('index');



Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [contactController::class, 'index'])->name('contact');
Route::get('/basket', [basketController::class, 'index'])->name('basket');
Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel');
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::post('/ajouter_au_panier', [BasketController::class, 'ajouter_au_panier'])->name('ajouter_au_panier');

Route::post('/vider-panier', [BasketController::class, 'viderPanier'])->name('viderPanier');
Route::post('/vider-article-panier', [BasketController::class, 'viderArticlePanier'])->name('vider-article-panier');
Route::post('/update-item-quantity', 'BasketController@changerQuantiter');
Route::get('/get-total-price', 'BasketController@getTotalPrice');
//Route::post('/passer-commande', 'OrderController@passerCommande')->name('passer-commande');
Route::post('/passer-commande', [BasketController::class, 'passerCommande'])->name('passer-commande');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

//cela ne fonctionne pas
Route::get('/articles/{id}/show-crud-a', [ArticleController::class, 'showCrudA'])->name('articles.showCrudA');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
