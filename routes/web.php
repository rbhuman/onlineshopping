<?php

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

Route::get('/','FrontController@index')->name('home');
Route::get('/products','FrontController@products')->name('products');
Route::get('/product','FrontController@product')->name('product');
Auth::routes();
Route::get('/logout','Auth\LoginController@Logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cart','CartController');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

   

    Route::get('/',function(){
        return view('admin.index');
    })->name('admin.index');

    Route::get('product/',function(){
        return view('admin.product.index');
    })->name('product.index');

    Route::post('product/create',function(){
        return view('admin.product.create');
    })->name('product.create');
  
   Route::put('product/edit',function(){
        return view('admin.product.edit');
    })->name('product.edit');

    Route::resource('product','ProductsController');
    Route::resource('category','CategoriesController');
    Route::get('category','CategoriesController@index')->name('category.index');
 
    
});

Route::get('/checkout','CheckOutController@step1');
Route::get('/shipping-info','CheckOutController@shipping')->name('checkout.shipping');
Route::resource('address','AddressController');


