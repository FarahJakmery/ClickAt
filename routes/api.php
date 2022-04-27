<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CodeproductController;
use App\Http\Controllers\Api\FastproductController;
use App\Http\Controllers\Api\McategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    // Authentication Routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


// Main Categories Route
Route::resource('mcategories', McategoryController::class);
Route::get('mainCategory/{MainCategoryID}/fastSellingProducts', [McategoryController::class, 'showAllFastSellingProductsBelogsToMainCategory']);
Route::get('mainCategory/{MainCategoryID}/products', [McategoryController::class, 'showAllProductsBelogsToMainCategory']);

// Fast Selling Route
Route::get('fastSellingProduct', [FastproductController::class, 'index']);
Route::get('fastSellingProduct/{id}', [FastproductController::class, 'show']);

// Product Route
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);

// Product with code Route
Route::resource('productWithCode', CodeproductController::class);


Route::middleware(['jwt.verify'])->group(function () {
    // Wishlist Routes
    Route::get('Wishlist', [WishlistController::class, 'index']);
    Route::post('AddFastProductToWishlist', [WishlistController::class, 'storeFastProduct']);
    Route::post('AddProductToWishlist', [WishlistController::class, 'storeProduct']);
    Route::delete('Wishlistdestroy', [WishlistController::class, 'destroy'])->name('apiwishlist.destroy');

    // Order Routes
    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::post('addOrder', [OrderController::class, 'store'])->name('addOrder');
});
