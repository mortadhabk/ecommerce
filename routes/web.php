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

Route::get('/', function () {

  return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login/costum', 'LoginController@login')->name('login.custom');
Route::group(['middleware' => 'auth'], function(){








    Route::group(['middleware' => ['role:superadmin']], function(){

        Route::get('/admin',function(){
            return view('admin.dashboard');
        })->name('admin');
        Route::get('/admin/product','ProductsController@index')->name('admin.product');
        Route::get('/admin/product/create','ProductsController@create')->name('admin.product.create');
        Route::post('/admin/product/','ProductsController@store')->name('admin.product.store');
        Route::get('/admin/product/{slug}','ProductsController@show')->name('admin.product.show');
        Route::get('/admin/product/{slug}/edit','ProductsController@edit')->name('admin.user.edit');
        Route::post('/admin/product/{slug}','ProductsController@update')->name('admin.product.update');
        Route::get('/admin/product/delete/{slug}','ProductsController@destroy')->name('admin.product.delete');

        Route::get('/admin/category','CategoryController@index')->name('admin.category');
        Route::get('/admin/category/create','CategoryController@create')->name('admin.category.create');
        Route::post('/admin/category/','CategoryController@store')->name('admin.category.store');
        Route::get('/admin/category/{slug}','CategoryController@show')->name('admin.category.show');
        Route::get('/admin/category/{slug}/edit','CategoryController@edit')->name('admin.category.edit');
        Route::post('/admin/category/{slug}','CategoryController@update')->name('admin.category.update');
        Route::get('/admin/category/delete/{slug}','CategoryController@destroy')->name('admin.category.delete');

        Route::get('/admin/user','UserController@index')->name('admin.user');
        Route::get('/admin/user/create','UserController@create')->name('admin.user.create');
        Route::post('/admin/user/','UserController@store')->name('admin.user.store');
        Route::get('/admin/user/{slug}','UserController@show')->name('admin.user.show');
        Route::get('/admin/user/{slug}/edit','UserController@edit')->name('admin.user.edit');
        Route::post('/admin/user/{slug}','UserController@update')->name('admin.user.update');
        Route::get('/admin/user/delete/{slug}','UserController@destroy')->name('admin.user.delete');







});
});
Route::get('/shop/{id}','ShopController@index')->name('shop.index');
Route::post('/shop/{id}','ShopController@store')->name('shop.store');
Route::get('/shop/{id}/edit','ShopController@edit')->name('shop.edit');
Route::patch('/shop/{id}', 'ShopController@update')->name('shop.update');
Route::get('/shop/{id}/delete', 'ShopController@destroy')->name('shop.delete');


Route::get('product/create/{id}','ProductsController@create')->name('product.create');
Route::post('product/{id}','ProductsController@store')->name('product.store');
Route::get('product/{slug}','ProductsController@show')->name('product.show');
Route::get('product/{slug}/edit','ProductsController@edit')->name('product.edit');
Route::PATCH('product/{slug}','ProductsController@update')->name('product.update');
Route::get('product/delete/{slug}','ProductsController@destroy')->name('product.delete');

Route::get('product/price','PricesController@index')->name('price.index');
Route::post('product/','ProductsController@store')->name('product.store');
Route::get('product/{slug}','ProductsController@show')->name('product.show');




//carte Route
Route::get('panier','CartController@index')->name('cart.index');
Route::post('panier/ajouter','CartController@store')->name('cart.store');
Route::delete('panier/{rowId}','CartController@destroy')->name('cart.destroy');
Route::delete('/panier/viderpanier', function(){
    Cart::destroy();
});
