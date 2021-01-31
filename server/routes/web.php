<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EstateController;
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

    Route::prefix('cities')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('cities.index');
        Route::get('/create', [CityController::class, 'create'])->name('cities.create');
        Route::post('/create', [CityController::class, 'store'])->name('cities.store');
        Route::get('/edit/city_id', [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/edit/city_id', [CityController::class, 'update'])->name('cities.update');
        Route::get('/delete/city_id', [CityController::class, 'delete'])->name('cities.delete');
    });

    Route::prefix('estates')->group(function () {
        Route::get('/', [EstateController::class, 'index'])->name('estates.index');
        Route::get('detail/{id}', [EstateController::class, 'getEstateById'])->name('estates.detail');
        Route::post('changeStatus/{id}/', [EstateController::class, 'changeEstateStatus'])->name('estates.changeStatus');
    });

});


Route::get('{any}', function () {
    return view('client');
})->where('any','.*');

