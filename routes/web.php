<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Cart_itemsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PaymobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SMSController;
use Illuminate\Support\Facades\Route;




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
///////
// test route
Route::get('test',function(){
    return view('test');
});
/////
////
Route::get('/',[HomeController::class,'index']);
Route::get('home',[HomeController::class,'index'])->name('home');
Route::get('about',function(){
    return view('about');
})->name('about');
Route::get('shop/{id}',[HomeController::class,'shop'])->name('shop');
Route::get('refund-policy',function(){
    return view('refund-policy');
})->name('refund-policy');
Route::get('branches',[BrancheController::class,'index'])->name('branches');
Route::get('privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('contact',[ContactController::class,'create'])->name('contact');
Route::get('single-product/{id}', [HomeController::class,'SingleProduct'])->name('single_product');
Route::post('contact/send',[ContactController::class,'store'])->name('contact-send');
Route::get('search',[BookController::class,'search'])->name('search');
Route::group(['middleware'=>'auth'],function(){
    Route::get('order-details/{order_id}',[OrderController::class,'OrderDetails'])->name('order_details');
    Route::get('order-received',[OrderController::class,'OrderRecieved'])->name('order_received');
    Route::get('favourites',[WishlistController::class,'index'])->name('favourites');
    Route::get('checkout',[OrderController::class,'Checkout'])->name('checkout');
    Route::get('account-details',[UserController::class,'ProfileDetails'])->name('account_details');
    Route::get('profile',[UserController::class,'profile'])->name('profile');
    Route::get('orders',[OrderController::class,'index'])->name('orders');
    Route::put('edituserdata',[UserController::class,'edit'])->name('edit_user');
    // Route::put('/user/password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('favorite/{id}',[WishlistController::class,'store'])->name('add.favorite');
    Route::post('cart/{id}',[CartController::class,'Add'])->name('add.cart');
    Route::delete('favorite/delete/{id}',[WishlistController::class,'destroy'])->name('delete.favorite');
    Route::delete('cart/delete/{book_id}/{cart_id}/{price}',[Cart_itemsController::class,'destroy'])->name('delete.cart');
    Route::post('order/send',[OrderController::class,'store'])->name('order.create');


});
Route::group(['middleware'=>'admin'],function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('dashboard/users',[UserController::class,'index'])->name('viewusers');
    Route::get('dashboard/contacts',[ContactController::class,'index'])->name('viewcontacts');
    Route::get('dashboard/books',[BookController::class,'index'])->name('viewbooks');
    Route::get('dashboard/books/actions',[BookController::class,'actions'])->name('bookactions');
    Route::get('dashboard/books/create',[DashboardController::class,'createbook'])->name('createbook');
    Route::get('dashboard/books/update/{id}',[BookController::class,'Update'])->name('updatebook');
    Route::get('dashboard/users/actions',[DashboardController::class,'useractions'])->name('useractions');
    Route::get('dashboard/users/create',[DashboardController::class,'createuser'])->name('createuser');
    Route::get('dashboard/users/update/{id}',[UserController::class,'Update'])->name('updateuser');
    Route::get('dashboard/categories',[CategoryController::class,'index'])->name('viewcategories');
    Route::get('dashboard/categories/actions',[DashboardController::class,'categoryactions'])->name('categoryactions');
    Route::get('dashboard/categories/create',[DashboardController::class,'CreateCategory'])->name('createcategory');
    Route::get('dashboard/categoris/update/{id}',[CategoryController::class,'update'])->name('updatecategory');
    Route::get('dashboard/orders',[OrderController::class,'vieworders'])->name('vieworders');
    Route::get('dashboard/branches',[BrancheController::class,'view'])->name('viewbranches');
    Route::get('dashboard/branches/create',[DashboardController::class,'createbranche'])->name('createbranche');
    Route::get('dashboard/branches/actions',[DashboardController::class,'brancheactions'])->name('brancheactions');
    Route::get('dashboard/branches/update/{id}',[BrancheController::class,'update'])->name('updatebranche');
    Route::get('dashboard/banners/create',[DashboardController::class,'createbanner'])->name('createbanner');
    Route::get('dashboard/banners',[BannerController::class,'index'])->name('viewbanners');
    Route::get('dashboard/banners/actions',[DashboardController::class,'banneractions'])->name('banneractions');
    Route::post('user/create',[UserController::class,'Create'])->name('user.create');
    Route::delete('users/delete/{user_id}',[UserController::class,'destroy'])->name('user.destroy');
    Route::put('users/edit/{user_id}',[UserController::class,'UpdateUserData'])->name('user.edit');
    Route::post('books/create',[BookController::class,'store'])->name('book.create');
    Route::put('books/edit/{id}',[BookController::class,'edit'])->name('book.edit');
    Route::put('order/confirm/{id}',[OrderController::class,'ConfirmOrder'])->name('order.confirm');
    Route::delete('order/delete/{id}',[OrderController::class,'destroy'])->name('order.delete');
    Route::delete('book/delete/{book_id}',[BookController::class,'destroy'])->name('book.delete');
    Route::delete('category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
    Route::post('category/add/new',[CategoryController::class,'store'])->name('category.create');
    Route::put('category/edit/{category_id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::delete('contact/delete/{id}',[ContactController::class,'destroy'])->name('contact.delete');
    Route::post('branche/create',[BrancheController::class,'store'])->name('branch.create');
    Route::delete('branch/delete/{branch_id}',[BrancheController::class,'destroy'])->name('branch.delete');
    Route::put('branch/edit/{branch_id}',[BrancheController::class,'edit'])->name('branch.edit');
    Route::post('banner/create',[BannerController::class,'store'])->name('banner.create');
    Route::delete('banner/delete/{banner_id}',[BannerController::class,'destroy'])->name('banner.delete');
    Route::put('banner/edit/{banner_id}',[BannerController::class,'edit'])->name('banner.edit');

});


//Paymob Routes
Route::post('/credit', [PaymentController::class, 'payWithPaymob'])->name('pay'); // this route send all functions data to paymob
Route::get('/callback', [PaymentController::class, 'verifyWithPaymob'])->name('callback'); // this route get all reponse data to paymob
Route::get('/test',function(){
    return view('credit');
});

Route::post('/verify', [SMSController::class,'verify'])->name('verify');
Route::get('request-verify',function(){
    return view('auth.verifyphone');
})->name('request.verify');



// users =>
// books => ID , name , price , author , description , category_id , image , stock , number of pages , code , discount , price_after_discount,best_seller
// categories => ID , Name
// contacts => ID , Name , Phone , Email , Subject (enum) , message
// carts => ID ,  user_ID , total ,status
//cart_items => ID , User_ID, Book_id,cart_id,quantity
// orders => ID , User_ID , Status , total , total_after_discount
// order_items => ID , order_id , book_id , quantity , price
// invoices => ID , order_id , f_name , l_name , city, address, phone, email, notes, total
// wishlist => ID , Book_id , user_id
// branches => ID , short_address , full_address , city , phone
// Slider => ID, Image , Status (0 , 1)
// banners => ID,Image,Status(0,1)
