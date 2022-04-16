<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CodeproductController;
use App\Http\Controllers\Admin\FastproductController;
use App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

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

// The first View that appear to the user is the Home Page
Route::get('/', function () {
    return view('User.Auth.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Route::resource('users', UserController::class);

// ============================ Users Routes ============================

Route::view('/home', 'User.Auth.home')->name('home');
Route::view('/about', 'User.pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');


// ============================ Admin Routes ============================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'Admin.Auth.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        // Authentication Routes
        Route::view('/home', 'Admin.dashboard')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        //
        Route::resource('mcategories', McategoryController::class);
        Route::resource('fastSellingProduct', FastproductController::class);
        Route::resource('products', ProductController::class);
        Route::resource('productWithCode', CodeproductController::class);
        Route::resource('about', AboutController::class);
    });
});

Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'User.Auth.home')->name('home');
        Route::view('/login', 'User.Auth.login')->name('login');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/add-new', [UserController::class, 'add'])->name('add');

        // Main Categories Routes
        Route::resource('mcategories', McategoryController::class);
        // Fast Selling Products Routes
        Route::resource('fastSellingProduct', FastproductController::class);
        // Product Routes
        Route::resource('products', ProductController::class);
        // Products with Codes Routes
        Route::resource('productWithCode', CodeproductController::class);
        // WhishList Routes
        Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.index');
        Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
        Route::delete('wishlistdestroy', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    });
});


require __DIR__ . '/auth.php';
