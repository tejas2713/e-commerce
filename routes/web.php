<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {


    Route::get('/', [AdminController::class, 'dashbord']);

    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::post('/admin/category', [CategoryController::class, 'store']);
    Route::post('/admin/category/delete', [CategoryController::class, 'remove']);
    Route::post('/admin/category/edit', [CategoryController::class, 'edit']);

    Route::get('/admin/subCategory', [SubCategoryController::class, 'index']);
    Route::post('/admin/subCategory', [SubCategoryController::class, 'store']);
    Route::post('/admin/subCategory/delete', [SubCategoryController::class, 'remove']);
    Route::post('/admin/subCategory/edit', [SubCategoryController::class, 'edit']);

    Route::get('/admin/tax', [TaxController::class, 'index']);
    Route::post('/admin/tax', [TaxController::class, 'store']);
    Route::post('/admin/tax/delete', [TaxController::class, 'remove']);
    Route::post('/admin/tax/edit', [TaxController::class, 'edit']);


    Route::get('/admin/unit', [UnitController::class, 'index']);
    Route::post('/admin/unit', [UnitController::class, 'store']);
    Route::post('/admin/unit/delete', [UnitController::class, 'remove']);
    Route::post('/admin/unit/edit', [UnitController::class, 'edit']);






    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::post('/admin/product', [ProductController::class, 'store']);
    Route::post('/admin/product/delete', [ProductController::class, 'remove']);

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/master', [App\Http\Controllers\WebsiteController::class, 'index']);
Route::get('/master/shop', [App\Http\Controllers\WebsiteController::class, 'shop']);
Route::get('/master/shoppingCard', [App\Http\Controllers\WebsiteController::class, 'shopingCard']);
Route::get('/master/shopDetails', [App\Http\Controllers\WebsiteController::class, 'shopDetails']);
Route::get('/master/chackout', [App\Http\Controllers\WebsiteController::class, 'chackout']);
Route::get('/master/about', [App\Http\Controllers\WebsiteController::class, 'about']);
Route::get('/master/contact', [App\Http\Controllers\WebsiteController::class, 'contact']);
Route::get('/master/blog', [App\Http\Controllers\WebsiteController::class, 'blog']);
Route::get('/master/blogDetails', [App\Http\Controllers\WebsiteController::class, 'blogDetails']);


