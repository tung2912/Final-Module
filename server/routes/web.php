<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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




Route::get('/login',[LoginController::class,'showLogin'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('admin.login');
Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->group(function (){

    Route::get('/',[DashboardController::class,'dashboard'])->name('admin.dashboard');

    Route::prefix('users')->group(function () {
        Route::get('',[UserController::class,'index'])->name('users.index');
        Route::get('/create',[UserController::class,'create'])->name('users.create');
        Route::post('/create',[UserController::class,'store'])->name('users.store');
        Route::get('/edit/{user_id}',[UserController::class,'edit'])->name('users.edit');
        Route::post('/edit/{user_id}',[UserController::class,'update'])->name('users.update');
        Route::get('/delete/{user_id}',[UserController::class,'delete'])->name('users.delete');
        Route::get('/profile/{user_id}',[UserController::class,'profile'])->name('users.profile');
        Route::get('/staffEdit/{user_id}',[UserController::class,'staffEdit'])->name('users.staffEdit');
        Route::post('/staffEdit/{user_id}',[UserController::class,'staffUpdate'])->name('users.staffUpdate');
    });

});




Route::get('{any}', function () {
    return view('client');
})->where('any','.*');
