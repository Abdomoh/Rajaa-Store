<?php

namespace App\Http\Controllers\Admin;
//namespace App\Http\Controllers\Web;
use App\Http\Controllers\Web\LandPageController;
use App\Http\Controllers\Web\ProductControlller;
use App\Http\Controllers\Web\CategoryControlller;
use App\Http\Controllers\Web\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\SearchController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\PostControlller;
use App\Http\Controllers\Web\SocilateController;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {
    $categoryies = Category::latest()->paginate(10);
    $products = Product::latest()->paginate(6);
    $products_modern = Product::orderBy('created_at', 'desc')->paginate(3);
    $products_old = Product::orderBy('created_at', 'asc')->paginate(3);
    $user_id = Auth::user()->id ?? 'None';
    $subtotal = Cart::sum('total');
    $count_cart = Cart::where('user_id', Auth::user()->id ?? 'None')->count();
    $sum_total = Cart::where('user_id', Auth::user()->id ?? 'None')->sum('total');
    $posts = Post::orderBy('created_at', 'asc')->paginate(3);
    return view('welcome', compact('products', 'categoryies', 'products_modern', 'products_old', 'count_cart', 'sum_total', 'posts'));
});
Route::group(['prefix', 'middleware' => 'roles', 'roles' => ['admain']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destory']);
Route::get('/access-denid', [DashboardController::class, 'accessDenid']);

Route::group(['prefix'],  function () {
    Route::resource('welcome', LandPageController::class);
    Route::resource('products', ProductControlller::class);
    Route::resource('categoryies', CategoryControlller::class);
    Route::get('shoping', [ProductControlller::class, 'shoping'])->name('shoping');
    Route::post('add-to-cart', [CartController::class, 'addProductToCart'])->name('cart.store')->middleware('auth');
    Route::get('cart-products', [CartController::class, 'cartProduct'])->name('cart-products')->middleware('auth');;
    Route::post('cart-update/{id}', [CartController::class, 'updateProductInCart'])->name('cart.update')->middleware('auth');;
    Route::post('cart-remove/{id}', [CartController::class, 'removeProductInCart'])->name('cart.remove')->middleware('auth');;
    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');;
    Route::post('checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.store')->middleware('auth');;
    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('order/{id}', [OrderController::class, 'show'])->name('order-detiles');
    Route::get('search', [SearchController::class, 'searchProduct'])->name('search');
    Route::get('contact', [AboutController::class, 'about'])->name('contact');
    Route::post('contact', [AboutController::class, 'store'])->name('contact.store');
    Route::get('post/{id}', [PostControlller::class, 'show'])->name('post-detiles');
});


Route::group(['prefix' => 'dashboard', 'middleware' => 'roles', 'roles' => ['admain']],  function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
    Route::resource('clients', ClientController::class);
    Route::get('orders', [OrdersController::class, 'index']);
    Route::get('update-order/{id}', [OrdersController::class, 'updateStatusOrder']);
    Route::get('show-order/{id}', [OrdersController::class, 'showOrder']);
    Route::get('status-paid-order/{id}', [OrdersController::class, 'changeStatusPiadOrder']);
});

Route::get('/migrate', function () {

    //Artisan::call('migrate', array('--force' => true));
    Artisan::call('migrate', ["--force" => true]);
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Migrating Is Done";
});


/*test login Facebook*/
Route::get('login/{google}', [SocilateController::class, 'redirect']);
Route::get('login/{google}/callback', [SocilateController::class, 'callback']);
/*end test*/
