<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CodeproductController;
use App\Http\Controllers\Admin\FastproductController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CodeproductController as UserCodeproductController;
use App\Http\Controllers\User\FastproductController as UserFastproductController;
use App\Http\Controllers\User\McategoryController as UserMcategoryController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\SearchController;
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
        // Admin Routes
        Route::resource('admins', AdminController::class);
        //
        Route::resource('mcategories', McategoryController::class);
        Route::resource('fastSellingProduct', FastproductController::class);
        Route::resource('products', ProductController::class);
        Route::resource('productWithCode', CodeproductController::class);
        // About Routes
        Route::resource('about', AboutController::class);
        // Features Routes
        Route::resource('features', FeatureController::class);
        // Order Routes
        Route::resource('orders', OrderController::class);
        // Order types Routes
        Route::get('/paying', [OrderController::class, 'paying_order']);
        Route::get('/wait_shimp', [OrderController::class, 'wait_shimp']);
        Route::get('/shimp', [OrderController::class, 'shimp']);
        Route::get('/done', [OrderController::class, 'done']);
        Route::get('/canceled', [OrderController::class, 'canceled']);
        // User Routes
        Route::resource('users', AdminUserController::class);
    });
});



// Route::view('/home', 'User.Auth.home')->name('home');

// Route::view('/contact', 'pages.contact')->name('contact');
// ============================ Users Routes ============================
Route::name('user.')->group(function () {


    Route::view('/home', 'User.Auth.home')->name('home');
    Route::view('/login', 'User.Auth.login')->name('login');
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::post('/check', [UserController::class, 'check'])->name('check');

    // Main Categories Routes
    Route::resource('mcategories', UserMcategoryController::class);
    Route::get('MainCategory/{MainCategoryID}/fastSellingProducts', [UserMcategoryController::class, 'showAllFastSellingProductsBelogsToMainCategory'])->name('showFastProductsForMainCategory');
    Route::get('MainCategory/{MainCategoryID}/products', [UserMcategoryController::class, 'showAllProductsBelogsToMainCategory'])->name('showProductsForMainCategory');
    // Fast Selling Products Routes
    Route::resource('FastSellingProducts', UserFastproductController::class);
    // Product Routes
    Route::resource('Products', UserProductController::class);
    // Codes Routes
    Route::get('Codes', [UserCodeproductController::class, 'index'])->name('Codes.index');
    // pages Routes
    Route::get('about', [PageController::class, 'about'])->name('about');
    // Search Routes
    Route::get('searchResult', [SearchController::class, 'search'])->name('search');
    // Add To Cart
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/Cart', [CartController::class, 'show'])->name('Cart');
    // Order Routes
    Route::resource('Orders', UserOrderController::class);
    Route::get('orderItems', [UserOrderController::class, 'getOrderItems'])->name('getOrderItems');
    // Payment Routes
    Route::get('Payment_Page', [PaymentController::class, 'getPaymentPage'])->name('getPaymentPage');
    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/profile/{profile}/edit', [UserController::class, 'edit'])->name('editProfile');
        Route::put('/profile/{profile}', [UserController::class, 'update'])->name('updateProfile');

        // WhishList Routes
        Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.index');
        Route::post('AddFastProductToWishlist', [WishlistController::class, 'storeFastProduct'])->name('AddFastProductToWishlist');
        Route::post('AddProductToWishlist', [WishlistController::class, 'storeProduct'])->name('AddProductToWishlist');
        Route::delete('Wishlistdestroy', [WishlistController::class, 'destroy'])->name('wishlistDestroy');
    });
});
