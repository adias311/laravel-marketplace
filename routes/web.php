<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductGalleryController as AdminProductGalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/success', [CartController::class, 'success'])->name('success');


Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])->name('dashboard-product-details');
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');

Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transaction-details');

Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

Route::prefix('admin')->middleware([])->group(function () {
  Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
  Route::resource('category', AdminCategoryController::class);
  Route::resource('user', AdminUserController::class);
  Route::resource('product', AdminProductController::class);
  Route::resource('product-gallery', AdminProductGalleryController::class);
});

Auth::routes();

//'auth', 'admin'