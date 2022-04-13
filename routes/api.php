<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CodeproductController;
use App\Http\Controllers\Api\FastproductController;
use App\Http\Controllers\Api\McategoryController;
use App\Http\Controllers\Api\ProductController;
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


Route::middleware(['jwt.verify'])->group(function () {
    // Main Categories Route
    Route::resource('mcategories', McategoryController::class);
    // Fast Selling Route
    Route::get('fastSellingProduct', [FastproductController::class, 'index']);
    Route::get('fastSellingProduct/{id}', [FastproductController::class, 'show']);
    Route::get('mainCategory/{MainCategoriesID}/fastSellingProduct/{fastSellingProductId}', [FastproductController::class, 'showFastSellingProductBelogsToMainCategory']);
    // Product Route
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::get('mainCategory/{MainCategoriesID}/products/{productsId}', [ProductController::class, 'showProductBelogsToMainCategory']);
    // Product with code Route
    Route::resource('productWithCode', CodeproductController::class);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
