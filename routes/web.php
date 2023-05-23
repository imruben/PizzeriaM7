<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
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

Route::get('/', function () {
    return redirect(route("pizzas.index"));
});

Route::get('/dashboard', function () {
    return redirect(route("pizzas.index"));
});

Route::controller(CartController::class)->middleware('auth')->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    // Route::post('/cart/addpizza/{pizza}', 'addPizzaToCart')->name('cart.addPizzaToCart');
});

Route::controller(PizzaController::class)->middleware('auth')->group(function () {
    Route::get('/pizzas', 'index')->name('pizzas.index');
    Route::post('/cart/addpizza/{pizza}', 'addPizzaToCart')->name('cart.addPizzaToCart');
    Route::post('/cart/deletepizza/{pizza}', 'deletePizzaFromCart')->name('cart.deletePizzaFromCart');
    Route::get('/cart/emptycart', 'clearAllPizzasFromCart')->name('cart.clearAllPizzasFromCart');
});

Route::resource('order', OrderController::class)
    ->middleware('auth');

Route::resource('admin', AdminController::class)
    ->middleware('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
