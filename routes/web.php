<?php
<<<<<<< HEAD
//admin
=======

>>>>>>> master
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;


<<<<<<< HEAD

//user
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopdetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;


=======
>>>>>>> master
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
<<<<<<< HEAD
Route::middleware([AuthenticateMiddleware::class])->group(function() {
    Route::get('product', [ProductController::class, 'index'])
        ->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])
        ->name('product.create');
    Route::post('product', [ProductController::class, 'handlecreate'])
        ->name('handlecreate');
    Route::delete('product/{id}', [ProductController::class, 'delete'])
        ->name('product.delete');
});
=======
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
>>>>>>> master

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
<<<<<<< HEAD
->middleware(AuthenticateMiddleware::class);





/* User */
//Trang chủ
Route::get('index', [TrangchuController::class, 'index'])
->name('trangchu');
//Testimonial
Route::get('testimonial', [TestimonialController::class, 'index'])
->name('testimonial');
//Shop
Route::get('shop', [ShopController::class, 'index'])
->name('shop');
//Shop detail
Route::get('shopdetail', [ShopdetailController::class, 'index'])
->name('shopdetail');
//Cart
Route::get('cart', [CartController::class, 'index'])
->name('cart');
//Checkout
Route::get('checkout', [CheckoutController::class, 'index'])
->name('checkout');
//Contact
Route::get('contact', [ContactController::class, 'index'])
->name('contact');
=======
->middleware(AuthenticateMiddleware::class);
>>>>>>> master
