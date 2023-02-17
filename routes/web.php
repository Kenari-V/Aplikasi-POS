<?php

use App\Http\Controllers\aplikasipos;
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
});

Route::get('/kasir',[kasircontroller::class,'index'])->middleware('auth');



