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

Route::get('/','MainController@index')->name('index');
Route::get('/category/{id}/','MainController@category')->name('category');
Route::get('/produit/{id}','MainController@produit')->name('show_produit');
Route::get('/tag/{id}','MainController@viewByTag')->name('show_tag');
Route::get('/dashboard','MainController@index')->name('index');

Route::post('/panier/add','CartController@add')->name('cart_add');
Route::put('/panier/{product}','CartController@update')->name('cart_update');
// Route::post('/panier/{id}','CartController@add')->name('cart_add');

Route::get('/panier','CartController@index')->name('cart_index');
Route::get('/commande','CartController@commande')->name('cart_commande');
Route::delete('/panier/{id}','CartController@remove')->name('cart_remove');

//payment
Route::post('/handel-payment','PaypalPaymentController@handlPayment')->name('make.payment');
Route::get('/cancel-payment','PaypalPaymentController@paypalCancel')->name('cancel.payment');
Route::get('/success-payment','PaypalPaymentController@paypalSuccess')->name('success.payment');






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');
