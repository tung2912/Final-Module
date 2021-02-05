<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\CityController;

use App\Http\Controllers\EstateController;
use App\Http\Controllers\ClientController;


use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');


    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{user_id}', [UserController::class, 'update'])->name('users.update');
        Route::post('/delete/{user_id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/profile/{user_id}', [UserController::class, 'profile'])->name('users.profile');
        Route::get('/staffEdit/{user_id}', [UserController::class, 'staffEdit'])->name('users.staffEdit');
        Route::post('/staffEdit/{user_id}', [UserController::class, 'staffUpdate'])->name('users.staffUpdate');
        Route::get('/changePass',[UserController::class,'changePass'])->name('users.changePass');
        Route::post('/changePass',[UserController::class,'updatePass'])->name('users.updatePass');

    });

    Route::prefix('cities')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('cities.index');
        Route::get('/create', [CityController::class, 'create'])->name('cities.create');
        Route::post('/create', [CityController::class, 'store'])->name('cities.store');
        Route::get('/edit/{city_id}', [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/edit/{city_id}', [CityController::class, 'update'])->name('cities.update');
        Route::get('/delete/{city_id}', [CityController::class, 'delete'])->name('cities.delete');

    });

    Route::prefix('blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/create', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/edit/{blog_id}', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::post('/edit/{blog_id}', [BlogController::class, 'update'])->name('blogs.update');
        Route::get('/delete/{blog_id}', [BlogController::class, 'delete'])->name('blogs.delete');
        Route::get('/details/{user_id}', [BlogController::class, 'details'])->name('blogs.details');
    });


        Route::get('/edit/{city_id}', [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/edit/{city_id}', [CityController::class, 'update'])->name('cities.update');
        Route::get('/delete/{city_id}', [CityController::class, 'delete'])->name('cities.delete');




    Route::prefix('estates')->group(function () {
        Route::get('/', [EstateController::class, 'index'])->name('estates.index');
        Route::get('/detail/{id}', [EstateController::class, 'getEstateById'])->name('estates.detail');
        Route::post('/changeStatus/{status_id}/', [EstateController::class, 'changeEstateStatus'])->name('estates.changeStatus');
        Route::get('/EstateStatus/{status_id}/', [EstateController::class, 'showEstateStatusById'])->name('estates.showEstateStatusById');
        Route::get('/EstateStatus/{status_id}/', [EstateController::class, 'classifyEstateByStatus'])->name('estates.classifyEstateByStatus');
    });


    Route::prefix('clients')->group(function () {
         Route::get('/owners', [ClientController::class, 'getOwners'])->name('clients.owners');
         Route::get('/ownersDetail/{owner_id}', [ClientController::class, 'getOwnerDetail'])->name('clients.ownerDetail');
         Route::get('/subscribers', [ClientController::class, 'getSubscribers'])->name('clients.subscribers');
         Route::get('/deleteSubscriber/{subscriber_id}', [ClientController::class, 'deleteSubscriber'])->name('clients.deleteSubscriber');
    });

    Route::prefix('subscribes')->group(function (){
        Route::get('/',[SubscribeController::class,'index'])->name('subscribes.index');
        Route::get('/details/{id}',[SubscribeController::class,'getSubscribeById'])->name('subscribes.detail');
        Route::post('/changeStatus/{status_id}/', [SubscribeController::class, 'changeStatus'])->name('subscribes.changeStatus');
        Route::get('/SubscribeStatus/{status_id}/', [SubscribeController::class, 'show'])->name('subscribes.showSubscribeStatusById');
        Route::post('/changeStatus/{status}/', [SubscribeController::class, 'changeStatus'])->name('subscribes.changeStatus');
        Route::get('/classifyByStatus/{status}/', [SubscribeController::class, 'classifySubscribeByStatus'])->name('subscribes.classifySubscribeByStatus');
    });

    Route::prefix('images')->group(function () {
        Route::get('/',[ImageController::class,'index'])->name('images.index');
        Route::get('/create',[ImageController::class,'create'])->name('images.create');
        Route::post('/create',[ImageController::class,'store'])->name('images.store');
    });

});






Route::get('{any}', function () {
    return view('client');
})->where('any','.*');


