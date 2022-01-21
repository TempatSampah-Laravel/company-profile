<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontAboutController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\FrontContactController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ConfigWebController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\FrontCatalogController;

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
// Frontend
Route::get('lang/{language}', [LocalizationController::class , 'index'])->name('localization');
Route::get('/', [FrontHomeController::class, 'index'])->name('home');
Route::get('/product', [FrontProductController::class, 'index'])->name('product');
Route::get('/product/detail/{slug}', [FrontProductController::class, 'detailProduct'])->name('product.detail');
Route::get('/about', [FrontAboutController::class, 'index'])->name('about');
Route::get('/contact', [FrontContactController::class, 'index'])->name('contact');
Route::post('/contact', [FrontContactController::class, 'sendMessage'])->name('send.message');
Route::get('/catalog', [FrontCatalogController::class, 'index'])->name('catalog');




Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login/check', [AuthController::class, 'login'])->name('login.check'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['auth', 'web'])->group(function () {
    Route::prefix('admin-panel')->group(function () {

        // CKeditor Upload
        Route::post('/ckeditor/upload', [CkeditorController::class, 'upload'])->name('upload');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('/user', UserController::class)->except('show');

        Route::resource('/role', RoleController::class)->except('show');
        Route::get('/role/access/{id}', [RoleController::class, 'roleAccess'])->name('role.access');
        Route::post('role/proses_role_access', [RoleController::class, 'proses_role_access'])->name('role.proses');

        // Configuration 
        Route::resource('/config', ConfigWebController::class)->shallow()->only(['index', 'update']);

        // ABOUT 
        Route::resource('/about', AboutController::class)->shallow()->only(['index', 'update']);

        // Banner 
        Route::resource('/banner', BannerController::class)->shallow()->only(['index', 'update']);

        // Product
        Route::resource('/category-product', CategoryProductController::class)->except(['show']);
        Route::resource('/product', ProductController::class)->except(['show']);

        // Service
        Route::resource('/service', ServiceController::class)->except(['show']);

        // Client
        Route::resource('/client', ClientController::class)->except(['show']);

        // Certificate
        Route::resource('/certificate', CertificateController::class)->except(['show']);

        // Catalog
        Route::resource('/catalog', CatalogController::class)->except(['show']);

        // Message
        Route::get('/message', [MessageController::class, 'index'])->name('message.index');
        Route::get('/message/detail/{slug}', [MessageController::class, 'show'])->name('message.detail');

    });
});