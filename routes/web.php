<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;

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

Route::get('/', [FrontendController::class, 'getHome']);

Route::get('details/{id}/{slug}.html', [FrontendController::class, 'getDetail']);

Route::get('category/{id}/{slug}.html',[FrontendController::class,'getCategory']);

Route::post('details/{id}/{slug}.html',[FrontendController::class,'postCommet']);

Route::get('search',[FrontendController::class,'getSearch']);


Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}',[CartController::class,'getAddCart']);
    Route::get('show',[CartController::class,'getShowCart']);
    Route::get('delete/{id}',[CartController::class,'getDeleteCart']);
});

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'getlogin']);
    Route::post('/', [LoginController::class, 'postlogin'])->name('login.ok'); 


    })->middleware('CheckLogedIn');

    Route::get('logout', [HomeController::class, 'getLogout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('home', [HomeController::class, 'getHome'])->name('admin.home');
        Route::group(['prefix'=> 'category'],function(){
            Route::post('/', [CategoryController::class, 'postCate']);

            Route::get('/', [CategoryController::class, 'getCate']);

            Route::get('edit/{id}', [CategoryController::class, 'getEditCate']);
            Route::post('edit/{id}', [CategoryController::class, 'postEditCate']);

            Route::get('delete/{id}', [CategoryController::class, 'getDeleteCate']);
            Route::post('delete/{id}', [CategoryController::class, 'postDeleteCate']);
        });
    
        Route::group(['prefix'=> 'product'],function(){
            Route::post('/', [ProductController::class, 'postProduct']);
            Route::get('/', [ProductController::class, 'getProduct']);

            Route::get('/add', [ProductController::class, 'getAddProduct']);
            Route::post('/add', [ProductController::class, 'postAddProduct']);
           

            Route::get('edit/{id}', [ProductController::class, 'getEditProduct']);
            Route::post('edit/{id}', [ProductController::class, 'postEditProduct']);

            Route::get('delete/{id}', [ProductController::class, 'getDeleteProduct']);
            Route::post('delete/{id}', [ProductController::class, 'postDeleteProduct']);
        });
        

    
    })->middleware('CheckLogedOut');