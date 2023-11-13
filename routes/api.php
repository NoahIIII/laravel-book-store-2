<?php


use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\BrancheController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\WishlistController;
use App\Http\Controllers\Cart_itemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('/',[HomeController::class,'index']);
Route::get('home',[HomeController::class,'index']);
Route::get('shop/{id}',[HomeController::class,'shop']);
Route::get('single-product/{id}', [HomeController::class,'SingleProduct']);
Route::get('branches',[BrancheController::class,'index']);
Route::get('contact',[ContactController::class,'create']);
Route::post('contact/send',[ContactController::class,'store']);
Route::group(['middleware'=>'auth:sanctum'],function() {

    Route::post('logout',[AuthController::class,'logout']);
    Route::post('cart/{id}',[CartController::class,'Add'])->name('add.cart');
    Route::delete('cart/delete/{book_id}/{cart_id}/{price}',[Cart_itemsController::class,'destroy'])->name('delete.cart');
    Route::get('order-details/{order_id}',[OrderController::class,'OrderDetails'])->name('order_details');
    Route::get('checkout',[OrderController::class,'Checkout'])->name('checkout');
    Route::get('orders',[OrderController::class,'index'])->name('orders');
    Route::post('order/send',[OrderController::class,'store'])->name('order.create');
    Route::get('favourites',[WishlistController::class,'index'])->name('favourites');
    Route::post('favorite/{id}',[WishlistController::class,'store'])->name('add.favorite');
    Route::delete('favorite/delete/{id}',[WishlistController::class,'destroy'])->name('delete.favorite');
});
Route::group(['middleware'=>'guest'],function(){
    Route::post('register',[AuthController::class,'Register']);
    Route::post('login',[AuthController::class,'login']);
});
Route::group(['middleware'=>'admin'],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');


});




