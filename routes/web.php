<?php

//admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\Admin\UserController;


//user
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopdetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;

Route::get('/', [TrangchuController::class,'index']
)->name('trangchu');
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

Route::get('search-products',[ShopController::class,'search'])->name('search.product');


//Customer
Route::get('customer', [CustomerController::class, 'index'])
->name('customer.index')
->middleware(AuthenticateMiddleware::class);

Route::post('customer/update/{id}', [CustomerController::class, 'update'])
->name('customer.update')
->middleware(AuthenticateMiddleware::class);
Route::put('customer/{id}', [CustomerController::class, 'handleupdate'])
->name('handleupdate')
->middleware(AuthenticateMiddleware::class);

Route::delete('customer/{id}', [CustomerController::class, 'delete'])
->name('customer.delete')
->middleware(AuthenticateMiddleware::class);


//Order
Route::get('order', [OrderController::class, 'index'])
->name('order.index')
->middleware(AuthenticateMiddleware::class);
Route::post('order/detail/{id}', [OrderController::class, 'detail'])
->name('order.detail')
->middleware(AuthenticateMiddleware::class);

Route::put('order/{id}', [OrderController::class, 'update'])
->name('order.update');

//danhsachuser
Route::get('user', [UserController::class, 'index'])
->name('user.index')
->middleware(AuthenticateMiddleware::class);
//create
Route::get('user/create', [UserController::class, 'create'])
->name('user.create')
->middleware(AuthenticateMiddleware::class);
Route::post('user/store', [UserController::class, 'store'])
->name('user.store')
->middleware(AuthenticateMiddleware::class);
//edit
Route::get('user/edit/{id}', [UserController::class, 'edit'])
    ->name('user.edit')
    ->middleware(AuthenticateMiddleware::class);
Route::put('user/update/{id}', [UserController::class, 'update'])
    ->name('user.update')
    ->middleware(AuthenticateMiddleware::class);
//delete
Route::delete('user/delete/{id}', [UserController::class, 'delete'])
    ->name('user.delete')
    ->middleware(AuthenticateMiddleware::class);





/* User */
//Trang chủ


//ProductDetail
Route::get('detail/{id}',[ShopdetailController::class,'detail'])
->name('detail');



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

//Content
Route::get('content', [ContentController::class, 'index'])
->name('content');
//News
Route::get('news', [NewsController::class, 'index'])
->name('news');

//Customer
Route::get('profile', [ProfileController::class, 'index'])
->name('profile')
->middleware(AuthenticateMiddleware::class);




//API giỏ hàng
Route::middleware('api')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'API Phung is working!']);
    });
});
Route::prefix('cart')->group(function(){
    Route::get('/api',[CartController::class,'index']);
    Route::any('/api/add',[CartController::class,'add']);
    Route::put('/api/update',[CartController::class,'update']);
    Route::delete('/api/delete',[CartController::class,'delete']);
});
