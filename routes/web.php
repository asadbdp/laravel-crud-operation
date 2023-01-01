<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('welcome');
});

//---------------Brand-------------------//
Route::group(['prefix'=>'brand', 'as'=>'brand.'],function(){
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('create', [BrandController::class, 'create'])->name('create');
    Route::post('store',[BrandController::class, 'store'])->name('store');
    Route::get('{brand}/edit',[BrandController::class,'edit'])->name('edit');
    Route::put('{brand}/update',[BrandController::class,'update'])->name('update');
    Route::delete('{brand}/delete', [BrandController::class, 'delete'])->name('delete');


});


//---------------Category-------------------//
Route::prefix('category')->name('category.')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('{category}/update', [CategoryController::class, 'update'])->name('update');
    Route::delete('{category}/delete', [CategoryController::class, 'delete'])->name('delete');
});



//---------------Product-----------------//
Route::resource('product', ProductController::class);


