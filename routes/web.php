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
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentAdminController;
use App\Http\Controllers\Admin\OpinionController;



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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrivacyController;


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
Route::get('cart', [CartController::class, 'showCart'])
->name('cart');


//Checkout
Route::get('checkout', [CheckoutController::class, 'index'])
->name('checkout')
->middleware(AuthenticateMiddleware::class);
Route::post('checkout/finish/{id}',[CheckoutController::class,'update'])
->name('checkout.finish')
->middleware(AuthenticateMiddleware::class);



//Contact
Route::get('contact', [ContactController::class, 'index'])
->name('contact');

//Content
Route::get('content', [ContentController::class, 'index'])
->name('content');
//News
Route::get('news', [NewsController::class, 'index'])
->name('news');

//Profile
Route::get('profile', [ProfileController::class, 'index'])
->name('profile')
->middleware(AuthenticateMiddleware::class);
//edit
Route::get('profile/edit/{id}', [ProfileController::class, 'update'])
->name('profile.update');
Route::put('profile/{id}', [ProfileController::class, 'handleupdate'])
->name('profile.handleupdate');

//Review
Route::get('review',[ReviewController::class,'index'])
->name('review')
->middleware(AuthenticateMiddleware::class);
Route::delete('category/delete/{id}', [ReviewController::class, 'delete'])
        ->name('review.delete')
->middleware(AuthenticateMiddleware::class);

Route::get('review/update/{id}', [ReviewController::class, 'update'])
->name('update')
->middleware(AuthenticateMiddleware::class);


Route::post('review/create', [ShopdetailController::class, 'handlecreate'])
->name('handlecreate')
->middleware(AuthenticateMiddleware::class);



//Category
Route::get('category',[CategoryController::class,'index'])
->name('category')
->middleware(AuthenticateMiddleware::class);
Route::get('category/create', [CategoryController::class, 'create'])
        ->name('category.create')
->middleware(AuthenticateMiddleware::class);
Route::post('category/update/{id}', [CategoryController::class, 'update'])
        ->name('category.update')
->middleware(AuthenticateMiddleware::class);
Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])
        ->name('category.delete')
->middleware(AuthenticateMiddleware::class);

//Content
Route::get('content/index',[ContentController::class,'indexAdmin'])
->name('content.index')
->middleware(AuthenticateMiddleware::class);
Route::get('content/create', [ContentController::class, 'create'])
        ->name('content.create')
->middleware(AuthenticateMiddleware::class);
Route::post('content/update/{id}', [ContentController::class, 'update'])
        ->name('content.update')
->middleware(AuthenticateMiddleware::class);
Route::delete('content/delete/{id}', [ContentController::class, 'delete'])
        ->name('content.delete')
->middleware(AuthenticateMiddleware::class);


//Opinion
Route::get('opinion',[OpinionController::class,'index'])
->name('opinion')
->middleware(AuthenticateMiddleware::class);
Route::get('opinion/create', [OpinionController::class, 'create'])
        ->name('opinion.create')
->middleware(AuthenticateMiddleware::class);
Route::post('opinion/update/{id}', [OpinionController::class, 'update'])
        ->name('opinion.update')
->middleware(AuthenticateMiddleware::class);
Route::delete('opinion/delete/{id}', [OpinionController::class, 'delete'])
        ->name('opinion.delete')
->middleware(AuthenticateMiddleware::class);


//Register
Route::get('register', [RegisterController::class, 'index'])
->name('register');
Route::post('register', [RegisterController::class, 'handlecreate'])
->name('register.post');

//Privacy
Route::get('privacy', [PrivacyController::class, 'index'])
->name('privacy');


//API giỏ hàng
// Route::middleware('api')->group(function () {
//     Route::get('/test', function () {
//         return response()->json(['message' => 'API Phung is working!']);
//     });
// });
// Route::prefix('api')->group(function(){
    Route::get('api/',[CartController::class,'index']);
    Route::any('api/add',[CartController::class,'add']);
    Route::put('api/update',[CartController::class,'update']);
    Route::delete('api/delete/{id}',[CartController::class,'delete']);
// });
