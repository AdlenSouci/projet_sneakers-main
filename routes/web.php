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
Route::post('/add-to-basket', [BasketController::class, 'addToBasket'])->name('addToBasket');
Route::post('/clear-basket', [BasketController::class, 'clearBasket'])->name('clearBasket');
Route::post('/clear-basket-article', [BasketController::class, 'clearBasketArticle'])->name('clear-basket-article');
Route::post('/update-item-quantity', 'BasketController@updateItemQuantity');
Route::get('/get-total-price', 'BasketController@getTotalPrice');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
