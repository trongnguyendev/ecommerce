<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Auth\AuthController;
use App\Http\Controllers\V1\Auth\EmailVerificationController;
use App\Http\Controllers\V1\Brand\BrandController;
use App\Http\Controllers\V1\Category\CategoryController;
use App\Http\Controllers\V1\Product\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});



Route::prefix('/v1')->group(function () {

    Route::group(['prefix' => 'auth'], function() {

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::post('register', [AuthController::class, 'register'])->name('register');


        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
        Route::post('refreshToken', [AuthController::class, 'refreshAccessToken'])->name('refreshToken')->middleware('auth:sanctum');
    
    });

    Route::middleware(['auth:sanctum'])->group(function() {

        Route::get('user', [AuthController::class, 'user'])->name('user');
       
        // Route::post('/email/verify', [EmailVerificationController::class, 'sendVerificationEmail'])->name('verification.notice');
        // Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    });


    // Brands
    Route::resource('brand', BrandController::class);

    // Categories
    Route::resource('category', CategoryController::class);

    // Product
    Route::resource('product', ProductController::class);

    

});