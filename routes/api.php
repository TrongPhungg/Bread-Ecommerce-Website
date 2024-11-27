<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Route::middleware('api')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'API is working!']);
    });
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);      // Lấy danh sách sản phẩm trong giỏ
    Route::post('/add', [CartController::class, 'add']);    // Thêm sản phẩm vào giỏ
    Route::put('/update', [CartController::class, 'update']); // Cập nhật sản phẩm trong giỏ
    Route::delete('/remove', [CartController::class, 'remove']); // Xóa sản phẩm khỏi giỏ
});