<?php

use App\Http\Controllers\Admin\CodeproductController;
use App\Http\Controllers\Admin\FastproductController;
use App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\ProductController;
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

// The first View that appear to the user is the login page
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('mcategories', McategoryController::class);
Route::resource('fastSellingProduct', FastproductController::class);
Route::resource('products', ProductController::class);
Route::resource('productWithCode', CodeproductController::class);

require __DIR__ . '/auth.php';
