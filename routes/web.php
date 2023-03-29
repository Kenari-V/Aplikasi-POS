<?php

use App\Http\Controllers\aplikasipos;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\kasircontroller;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CekUserLogin;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Route::get('/kasir', function () {
//     return view('/layouts/kasir');
// });



// Route::get('login', [LoginController::class,'index'])->name('login');

// Route::get('/',[LayoutController::class,'index'])->name('layout')->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login/proses','proses');
    Route::get('logout','logout');

});

// Route::group(['middleware' => ['cekUserLogin:1']], function(){
//     Route::get('/dashboard',function(){
//         echo "login berhasil";
//     })->name('dashboard');
// });

Route::middleware([CekUserLogin::class])->group(function(){
    Route::get('/',[dashboardcontroller::class,'index'])->name('layout');
    Route::get('/Product',[ProductController::class,'index']);
    Route::get('/Product/tambah-product',[ProductController::class,'create']);
    Route::get('/Product/search', [ProductController::class,'search']);
    Route::post('/Product/tambah-product',[ProductController::class, 'tambahData']);
    Route::get('/Customer',[customercontroller::class, 'index']);
    Route::get('/Category', [categoryController::class, 'index']);
    Route::post('/Product',[ProductController::class, 'deleteProduct']);
    Route::post('/Product/print_barcode',[ProductController::class, 'printBarcode'])->name('Product.print_barcode');
    Route::get('/Product/{id_product}/editproduct',[ProductController::class, 'editdataProduk']);
    Route::put('/Product/{id_product}',[ProductController::class, 'updateProduk']);
    Route::get('/Category/tambah-category',[categoryController::class,'categorytambah']);
    Route::post('/Category/tambah-category',[categoryController::class,'categoryDataAdd']);
    Route::post('/Category',[categoryController::class,'categoryDelete']);
    Route::get('/Category/{id_category}/editcategory',[categoryController::class,'editdataCategory']);
    Route::put('/Category/{id_category}/',[categoryController::class,'updateCategory']);
    Route::get('/Customer/tambah-customer',[customercontroller::class, 'tambahCustomer']);
    Route::post('/Customer/tambah-customer',[customercontroller::class, 'customerAdd']);
    Route::post('/Customer',[customercontroller::class, 'deleteCustomer']);
    Route::get('/Customer/{id_customer}/editcustomer',[customercontroller::class, 'editdataCustomer']);
    Route::put('/Customer/{id_customer}/',[customercontroller::class, 'updateCustomer']);
    Route::get('/cart/add-item' , [kasircontroller::class , 'addCart']);
});

Route::get('/kasir',[kasircontroller::class,'index'])->middleware('auth');
Route::post('/kasir',[kasircontroller::class,'store'])->middleware('auth');

