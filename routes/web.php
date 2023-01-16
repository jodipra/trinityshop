<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\frontend\cartController;
use App\Http\Controllers\frontend\userController;
use App\Http\Controllers\frontend\bayarController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\unitrumahController;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\Admin\listperumahanController;
use App\Http\Controllers\frontend\frontendController as FrontendFrontendController;
use App\Http\Controllers\Frontend\wishlistController;

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

Route::get('/', [frontendController::class,'index']);
Route::get('listrumah',[frontendController::class,'listrumah']);
Route::get('listrumah/{slug}', [frontendController::class, 'viewlistrumah']);
Route::get('listrumah/{listrumah_slug}/{unitrumah_slug}',[frontendController::class,'unitview']);

Route::get('unit-list',[frontendController::class, 'unitlistajax']);
Route::post('searchunit',[frontendController::class, 'searchunit']);
Auth::routes();

Route::get('load-cart-data', [cartController::class, 'cartcount']);
Route::get('load-wishlist-count', [wishlistController::class, 'wishlishcount']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart', [cartController::class, 'addunit']);
Route::post('delete-cart-item', [cartController::class, 'deletecartitem']);
Route::post('update-cart', [cartController::class, 'updatecart']);

Route::post('add-to-wishlist', [wishlistController::class, 'add']);
Route::post('delete-wishlist-item', [wishlistController::class, 'deleteitem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [cartController::class, 'viewcart']);
    Route::get('bayar', [bayarController::class, 'index']);
    Route::post('bayar-sekarang',[bayarController::class,'bayarsekarang']);

    Route::get('my-order',[userController::class, 'index']);
    Route::get('view-order/{id}',[userController::class, 'view']);

    Route::get('wishlist',[wishlistController::class, 'index']);

    Route::post('proced-to-pay',[bayarController::class, 'razorpaycheck']);
});

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard','Admin\FrontendController@index');

    Route::get('listperumahan','Admin\listperumahanController@index');
    Route::get('add-listperumahan','Admin\listperumahanController@add');

    Route::post('insert-listperumahan','Admin\listperumahanController@insert');
    Route::get('edit-listperumahan/{id}',[listperumahanController::class , 'edit']);
    Route::put('update-listperumahan/{id}', [ listperumahanController::class,'update']);
    Route::get('delete-listperumahan/{id}', [listperumahanController::class,'destroy']);

    Route::get('unitrumah', [unitrumahController::class,'index']);
    Route::get('add-unitrumah', [unitrumahController::class,'add']);
    Route::post('insert-unitrumah', [unitrumahController::class, 'insert']);

    Route::get('edit-unitrumah/{id}', [unitrumahController::class, 'edit']);
    Route::put('update-unitrumah/{id}', [unitrumahController::class, 'update']);
    Route::get('delete-listrumah/{id}', [unitrumahController::class, 'destroy']);


    Route::get('orders', [OrderController::class,'index']);
    Route::get('admin/view-order/{id}', [OrderController::class,'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    
    Route::get('order-history', [OrderController::class, 'orderhistory']);
    
    Route::get('users',[dashboardController::class, 'users']);
    Route::get('view-user/{id}', [dashboardController::class, 'viewuser']);
});

Route::get('/test', function () {
    return view('test');
});
    