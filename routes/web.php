<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('setlocale', [IndexController::class, 'changeLanguage'])->name('language.change');


Route::group(['middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], static function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('about', [AboutController::class, 'index'])->name('front.about');
    Route::get('company', [\App\Http\Controllers\Frontend\CompanyController::class, 'index'])->name('front.company.index');
    Route::get('company/{id}', [\App\Http\Controllers\Frontend\CompanyController::class, 'show'])->name('front.company.show');
    Route::get('company/product/{id}', [\App\Http\Controllers\Frontend\ProductController::class, 'showByCompany'])->name('front.company.product.show');
    Route::get('/filter-products', [ProductController::class, 'filterProducts']);
    Route::get('product/{id}', [\App\Http\Controllers\Frontend\ProductController::class, 'show'])->name('front.product.show');
    Route::get('product/detail/{id}', [\App\Http\Controllers\Frontend\ProductController::class, 'detail'])->name('front.product.detail');
    Route::get('blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('front.blog.index');
    Route::get('blog/{id}', [\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('front.blog.show');
    Route::get('category/{id}', [\App\Http\Controllers\Frontend\CategoryController::class, 'show'])->name('front.category.show');
    Route::get('contact', [\App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('front.contact.index');
    Route::post('contact', [\App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('front.contact.store');
    Route::get('/filter-products-name', [\App\Http\Controllers\Frontend\ProductController::class, 'showByNameProduct'])->name('front.filter.product.show');

});
