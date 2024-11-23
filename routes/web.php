<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;


Route::get('/', function () {
    return view('welcome');
});
/* Admin */
//Auth
Route::get('adminz', [AuthController::class, 'index'])
->name('auth.admin');
Route::get('logout', [AuthController::class, 'logout'])
->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])
->name('auth.login')
->middleware(LoginMiddleware::class);

//Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])
->name('dashboard.index')
->middleware(AuthenticateMiddleware::class);


//Product
Route::get('product', [ProductController::class, 'index'])
->name('product.index')
->middleware(AuthenticateMiddleware::class);
Route::get('product/create', [ProductController::class, 'create'])
->name('product.create')
->middleware(AuthenticateMiddleware::class);
Route::post('product', [ProductController::class, 'handlecreate'])
->name('handlecreate')
->middleware(AuthenticateMiddleware::class);

Route::delete('product/{id}', [ProductController::class, 'delete'])
->name('product.delete')
->middleware(AuthenticateMiddleware::class);

Route::post('product/update/{id}', [ProductController::class, 'update'])
->name('product.update')
->middleware(AuthenticateMiddleware::class);
Route::put('product/{id}', [ProductController::class, 'handleupdate'])
->name('handleupdate')
->middleware(AuthenticateMiddleware::class);


//Customer
Route::get('customer', [CustomerController::class, 'index'])
->name('customer.index')
->middleware(AuthenticateMiddleware::class);


//Order
Route::get('order', [OrderController::class, 'index'])
->name('order.index')
->middleware(AuthenticateMiddleware::class);
Route::post('order/detail/{id}', [OrderController::class, 'detail'])
->name('order.detail')
->middleware(AuthenticateMiddleware::class);