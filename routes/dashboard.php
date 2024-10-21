<?php

use App\Http\Controllers\Dashboard\Core\AboutController;
use App\Http\Controllers\Dashboard\Core\BlogController;
use App\Http\Controllers\Dashboard\Core\CategoryController;
use App\Http\Controllers\Dashboard\Core\CompanyController;
use App\Http\Controllers\Dashboard\Core\CoverController;
use App\Http\Controllers\Dashboard\Core\OfferController;
use App\Http\Controllers\Dashboard\Core\ProductController;
use App\Http\Controllers\Dashboard\Core\ServiceController;
use App\Http\Controllers\Dashboard\Core\SettingController;
use App\Http\Controllers\Dashboard\Core\SliderController;
use App\Http\Controllers\Dashboard\Core\TeamController;
use App\Http\Controllers\Dashboard\IndexController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController;



Route::any('clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');

    session()->flash('success', 'All Command successfully');

    return redirect()->back();
})->name('clear.cache');


Route::group(['prefix' => 'dashboard', 'middleware' => 'guest:admin'], function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'loginForm'])
        ->name('loginForm');

    Route::post('/login', [AuthenticatedSessionController::class, 'doLogin'])
    ->name('login');


});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])
        ->name('logout');
    Route::resource('about', AboutController::class)->only(['index','edit','update']);
    Route::resource('setting', SettingController::class)->only(['index','edit','update']);
    Route::resource('service', ServiceController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('team', TeamController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('cover', CoverController::class)->except(['index','destroy']);
    Route::resource('product', ProductController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('offer', OfferController::class);
    Route::resource('contact', \App\Http\Controllers\Dashboard\Core\ContactController::class)->only(['index','destroy']);
    Route::post('/upload-image', [IndexController::class, 'uploadImage'])->name('uploadImage');

    // Route to get the gallery images
    Route::get('product/{id}/images', [ProductController::class, 'getImages'])->name('product.getImages');

// Route to delete a gallery image
    Route::delete('product/{id}/images/delete', [ProductController::class, 'deleteImage'])->name('product.deleteImage');

// Route to upload images
    Route::post('product/upload', [ProductController::class, 'upload'])->name('product.upload');
    Route::get('/categories/{company}', [CategoryController::class, 'getCategories']);

});
