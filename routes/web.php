<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\HomeController;

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



// Route::get('/prod', [ProductController::class, 'index']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::resource('products', ProductController::class);

Route::get('service', [ServiceController::class, 'index'])->name('service');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::post('quotes', [QuoteController::class, 'store'])->name('quotes.store');
    Route::get('/services/{service}/quotes', [QuoteController::class, 'index'])->name('quotes.index');
    
});


