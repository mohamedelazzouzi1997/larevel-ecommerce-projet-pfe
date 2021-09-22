<?php

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



//view route
Route::get('/','MainController@index')->name('index');

Route::get('/category/{id}/','MainController@category')->name('category');
Route::get('/produit/{id}','MainController@produit')->name('show_produit');
Route::get('/tag/{id}','MainController@viewByTag')->name('show_tag');
Route::get('/dashboard','MainController@index')->name('index');


// cart route
Route::post('/panier/add','CartController@add')->name('cart_add');
Route::put('/panier/{product}','CartController@update')->name('cart_update');
Route::get('/panier','CartController@index')->name('cart_index');
Route::get('/commande','CartController@commande')->name('cart_commande');
Route::delete('/panier/{id}','CartController@remove')->name('cart_remove');

//payment route
Route::post('/handel-payment','PaypalPaymentController@handlPayment')->name('make.payment');
Route::get('/cancel-payment','PaypalPaymentController@paypalCancel')->name('cancel.payment');
Route::get('/success-payment','PaypalPaymentController@paypalSuccess')->name('success.payment');

//admin route
// Route::get('/admin','adminController@index')->name('admin.index');
// Route::get('/admin/login','adminController@showAdminLoginForm')->name('admin.login');
// Route::post('/admin/login','adminController@adminLogin')->name('admin.login');
// Route::post('/admin/logout','adminController@adminLogout')->name('admin.logout');

//admin view
Route::get('/admin/show/products','adminController@showProducts')->name('product.admin');
Route::get('/admin/show/orders','adminController@showOrders')->name('orders.admin');

// Route::resource('Order', 'OrderController');
Route::put('/order','OrderController@update')->name('Order.update');
Route::delete('/order/{id}','OrderController@destroy')->name('Order.destroy');

Route::get('/product/edit/{id}','ProductController@edit')->name('Product.edit');
Route::POST('/product/edit/{id}','ProductController@update')->name('Product.update');
Route::delete('/product/{id}','ProductController@destroy')->name('Product.destroy');
Route::get('/product/create','ProductController@create')->name('Product.create');
Route::POST('/product/store','ProductController@store')->name('Product.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');
