<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserController;


use App\Http\Controllers\CityController;

use App\Http\Controllers\EstateController;
use App\Http\Controllers\ClientController;


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
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{user_id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{user_id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/profile/{user_id}', [UserController::class, 'profile'])->name('users.profile');
        Route::get('/staffEdit/{user_id}', [UserController::class, 'staffEdit'])->name('users.staffEdit');
        Route::post('/staffEdit/{user_id}', [UserController::class, 'staffUpdate'])->name('users.staffUpdate');

    });

    Route::prefix('cities')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('cities.index');
        Route::get('/create', [CityController::class, 'create'])->name('cities.create');
        Route::post('/create', [CityController::class, 'store'])->name('cities.store');
        Route::get('/edit/{city_id}', [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/edit/{city_id}', [CityController::class, 'update'])->name('cities.update');
        Route::get('/delete/{city_id}', [CityController::class, 'delete'])->name('cities.delete');
        Route::get('/edit/{city_id}', [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/edit/{city_id}', [CityController::class, 'update'])->name('cities.update');
        Route::get('/delete/{city_id}', [CityController::class, 'delete'])->name('cities.delete');

    });

    Route::prefix('estates')->group(function () {
        Route::get('/', [EstateController::class, 'index'])->name('estates.index');
        Route::get('detail/{id}', [EstateController::class, 'getEstateById'])->name('estates.detail');
        Route::post('changeStatus/{status_id}/', [EstateController::class, 'changeEstateStatus'])->name('estates.changeStatus');
        Route::get('EstateStatus/{status_id}/', [EstateController::class, 'showEstateStatusById'])->name('estates.showEstateStatusById');
    });


    Route::prefix('clients')->group(function () {
        Route::get('/registered', [ClientController::class, 'registered'])->name('clients.registered');
        Route::get('/subscribed', [ClientController::class, 'subscribed'])->name('clients.subscribed');


    });
});

//Route::get('{any}', function () {
//    return view('client');
//})->where('any','.*');


