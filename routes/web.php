<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
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
    return view('welcome');
});
Route::get('/booking', [ReservationController::class,'index']);
Route::post('/store', [ReservationController::class,'store']) -> name('booking.store');


Route::get('/movie', [MovieController::class,'index']) -> name('movie.index');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
Route::delete('/{movies}', [MovieController::class, 'destroy'])->name('movie.destroy');
Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{movie}/update', [MovieController::class, 'update'])->name('movie.update');

// Route::get('/products', [ProductController::class, 'indexAdmins'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/{products}', [ProductController::class, 'destroy'])->name('products.destroy');
