<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\BrandListController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\CategoryListController;
use App\Http\Controllers\User\ProductDetailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


//email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//end of email verification



//user routes

Route::controller(UserController::class)->group(function () {
    Route::get('/',  'index')->name('home');
    Route::get('/about',  'about')->name('about');
    Route::get('/contact',  'contact')->name('contact');
}); 

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //chekcout 
    Route::prefix('checkout')->controller(CheckoutController::class)->group((function () {
        Route::post('order', 'store')->name('checkout.store');
        Route::get('success', 'success')->name('checkout.success');
        Route::get('cancel', 'cancel')->name('checkout.cancel');
    }));
});

//add to cart
Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view', 'view')->name('cart.view');
    Route::post('store/{product}', 'store')->name('cart.store');
    Route::patch('update/{product}', 'update')->name('cart.update');
    Route::delete('delete/{product}', 'delete')->name('cart.delete');
});
// Route for viewing a single product
Route::get('/products/{slug}', [ProductDetailController::class, 'show'])->name('product.show');

//routes for products list and filter 
Route::prefix('products')->controller(ProductListController::class)->group(function () {
    Route::get('/', 'index')->name('products.index');
});
//routes for brands list and filter 
Route::prefix('brands')->controller(BrandListController::class)->group(function () {
    Route::get('/', 'index')->name('brands.index');
});
//routes for brands list and filter 
Route::prefix('categories')->controller(CategoryListController::class)->group(function () {
    Route::get('/', 'index')->name('categories.index');
});


//end 

// admin routes

Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //product routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products.index');
        Route::post('/products/store', 'store')->name('admin.products.store');
        Route::put('/products/update/{id}', 'update')->name('admin.products.update');
        Route::delete('/products/image/{id}', 'deleteImage')->name('admin.products.image.delete');
        Route::delete('/products/destory/{id}', 'destory')->name('admin.products.destory');
    });


    //brands routes
    Route::controller(BrandController::class)->group(function () {
        Route::get('brand/index', 'index')->name('admin.brand.index');
        Route::post('brand/store', 'store')->name('admin.brand.store');
        Route::put('brand/update/{id}', 'update')->name('admin.brand.update');
        Route::delete('brand/image/{slug}', 'deleteImage')->name('admin.brand.image.delete');
        Route::delete('brand/destroy/{id}', 'destroy')->name('admin.brand.destroy');
    });

    //category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category/index', 'index')->name('admin.category.index');
        Route::post('category/store', 'store')->name('admin.category.store');
        Route::put('category/update/{id}', 'update')->name('admin.category.update');
        Route::delete('category/image/{slug}', 'deleteImage')->name('admin.category.image.delete');
        Route::delete('category/destroy/{id}', 'destroy')->name('admin.category.destroy');
    });
    //user crud
    Route::controller(AdminUserController::class)->group(function () {
        Route::get('users', 'index')->name('admin.users.index');   // Adjusted endpoint and route name
        Route::post('users/store', 'store')->name('admin.users.store');   // Adjusted endpoint and route name
        Route::put('users/update/{id}', 'update')->name('admin.users.update'); // Adjusted endpoint and route name
        Route::delete('users/destroy/{id}', 'destroy')->name('admin.users.destroy'); // Adjusted endpoint and route name
    });
    

    //Order
    Route::controller(OrderController::class)->group(function () {
        Route::get('order/index', 'index')->name('admin.order.index');
        Route::get('order/invoice/{id}', 'invoice')->name('admin.order.invoice');
    });
});
//end
require __DIR__ . '/auth.php';
