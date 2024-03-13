<?php

use App\Http\Controllers\AuditoriumController;
use App\Http\Controllers\CustomerController;
use App\Models\Tag;
use App\Models\Genre;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TagController;

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

Route::get('/genres', [GenreController::class,'index']) -> name('genres.index');
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{genre}/update', [GenreController::class, 'update'])->name('genres.update');
Route::delete('genres/{genre}/destroy', [GenreController::class, 'destroy'])->name('genres.destroy');

Route::get('/tags', [TagController::class,'index']) -> name('tags.index');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}/update', [TagController::class, 'update'])->name('tags.update');
Route::delete('tags/{tag}/destroy', [TagController::class, 'destroy'])->name('tags.destroy');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');


Route::get('/auditoriums', [AuditoriumController::class,'index']) -> name('auditoriums.index');
Route::get('/auditoriums/{auditorium}/edit', [AuditoriumController::class, 'edit'])->name('auditoriums.edit');
Route::put('/auditoriums/{auditorium}/update', [AuditoriumController::class, 'update'])->name('auditoriums.update');
Route::delete('auditoriums/{auditoriums}/destroy', [AuditoriumController::class, 'destroy'])->name('auditoriums.destroy');
Route::get('/auditoriums/create', [AuditoriumController::class, 'create'])->name('auditoriums.create');
Route::post('/auditoriums', [AuditoriumController::class, 'store'])->name('auditoriums.store');

Route::get('/customers', [CustomerController::class,'index']) -> name('auditoriums.index');

// Route::get('/products', [ProductController::class, 'indexAdmins'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/{products}', [ProductController::class, 'destroy'])->name('products.destroy');
