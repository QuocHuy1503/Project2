<?php


use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CastController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\admin\GenreController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckLoginCustomer;
use Illuminate\Support\Str;

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

//Route::get('/', function (){
//    return 'hello';
//});

Route::get('/', function () {
    return view('customer.home');
})->name('home');

Route::get('/home', function () {
    return view('customer.home');
})->name('home');

Route::get('/movie', [MovieController::class, 'show'])->name('movie');

//show 1 product
//Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');


Route::get('/help', function () {
    return view('customer.help');
})->name('help');

Route::group(['prefix' => 'admin'], function (){

   Route::group(['middleware' => 'admin.guest'], function() {
       Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
       Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

   });

    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        // GENRE ROUTE
        Route::prefix('/genre')->group(function () {

            Route::get('/', [GenreController::class, 'index'])->name('genre.index');
            //show create form
            Route::get('/create', [GenreController::class, 'create'])->name('genre.create');
            Route::post('/create', [GenreController::class, 'store'])->name('genre.store');

            //show edit form
            Route::get('/{genre}/edit', [GenreController::class, 'edit'])->name('genre.edit');
            Route::put('/{genre}', [GenreController::class, 'update'])->name('genre.update');
            Route::delete('/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');
        });

        // MOVIE ROUTE
        Route::prefix('/movie')->group(function () {

            Route::get('/', [MovieController::class, 'index'])->name('movie.index');
            //show create form
            Route::get('/create', [MovieController::class, 'create'])->name('movie.create');
            Route::post('/create', [MovieController::class, 'store'])->name('movie.store');

            //show edit form
            Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
            Route::put('/{movie}', [MovieController::class, 'update'])->name('movie.update');
            Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
        });

        // CAST ROUTE
        Route::prefix('/cast')->group(function () {

            Route::get('/', [CastController::class, 'index'])->name('cast.index');
            //show create form
            Route::get('/create', [CastController::class, 'create'])->name('cast.create');
            Route::post('/create', [CastController::class, 'store'])->name('cast.store');
            Route::post('/upload-temp-image', [TempImagesController::class, 'createImgCast'])->name('temp-images.create');

            //show edit form
            Route::get('/{cast}/edit', [CastController::class, 'edit'])->name('cast.edit');
            Route::put('/{cast}', [CastController::class, 'update'])->name('cast.update');
            Route::delete('/{cast}', [CastController::class, 'destroy'])->name('cast.destroy');
            Route::get('/getSlug', function (\Illuminate\Http\Request $request){
               $slug = '';
               if (!empty($request->title)) {
                   $slug = Str::slug($request->title);
               }
               return response()->json([
                  'status' => true,
                   'slug' => $slug
               ]);
            })->name('getSlug');
        });
    });
});

Route::middleware(CheckLoginCustomer::class)->group(function () {
    Route::get('/profile', [CustomerController::class, 'editProfile'])->name('profile');
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');

    Route::get('/orders_history', [CustomerController::class, 'showOrderHistory'])->name('orderHistory');
    Route::get('/order_detail/{order}', [CustomerController::class, 'orderDetail'])->name('orderDetail');
//    Route::get('/cancel_order/{order}', [OrderController::class, 'cancelOrder'])->name('cancelOrder');

    Route::get('/change_password', [CustomerController::class, 'editPassword'])->name('pwd.edit');
    Route::put('/change_password', [CustomerController::class, 'updatePassword'])->name('pwd.update');

//    Route::get('/cart', [ProductController::class, 'cart'])->name('product.cart');
//    Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart');
//    Route::get('/addToCartAjax/{id}', [ProductController::class, 'addToCartAjax'])->name('product.addToCartAjax');
//    Route::get('/updateCartQuantity/{id}', [ProductController::class, 'updateCartQuantity'])->name('product.updateCartQuantity');
//    Route::get('/deleteFromCart/{id}', [ProductController::class, 'deleteFromCart'])->name('product.deleteFromCart');
//    Route::get('/deleteAllFromCart', [ProductController::class, 'deleteAllFromCart'])->name('product.deleteAllFromCart');
//
//    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
//    Route::post('/checkout', [OrderController::class, 'checkoutProcess'])->name('checkoutProcess');
});

Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/register', [CustomerController::class, 'registerProcess'])->name('customer.registerProcess');

Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');

Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/forgot_password', [CustomerController::class, 'forgotPassword'])->name('customer.forgotPassword');


