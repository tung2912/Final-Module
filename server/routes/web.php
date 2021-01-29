<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

});




Route::get('{any}', function () {
    return view('client');
})->where('any','.*');
