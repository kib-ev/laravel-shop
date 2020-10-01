<?php

use App\Http\Controllers\CartController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::match(['post', 'get'],'/carts/products/{product_id}/add', [CartController::class, 'addProduct'])
    ->name('carts.products.add');

    Route::match(['post', 'get'],'/carts/products/pivot/{pivot_id}/remove', [CartController::class, 'removeProduct'])
        ->name('carts.products.pivot.remove');

    Route::match(['post', 'get'],'/carts/products/pivot/{pivot_id}/update', [CartController::class, 'updateProduct'])
        ->name('carts.products.pivot.update');

});

