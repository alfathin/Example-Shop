<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;

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
    return view('welcome', [
        'header' => 'Home',
        'categories' => Category::all()
    ]);
});

Route::get('/login', 'AllController@vlogin')->name('Login');
Route::post('/login', 'AllController@login');

Route::get('/logout', 'AllController@logout');

Route::get('/register', 'AllController@vregister')->name('register');
Route::post('/register', 'AllController@register');

Route::get('/category/{category:id}', 'AllController@category');

Route::get('/products', 'AllController@products');
Route::get('/product/{product:id}', 'AllController@product');

Route::get('/cart', 'AllController@cart')->name('cart')->middleware('auth');
Route::post('/postcart/{product}', 'AllController@postcart')->name('postcart');
Route::get('/deletecart/{DetailTransaksi}', 'AllController@deletecart')->name('deletecart');

Route::get('/checkout/{detailtransaksi}', 'AllController@checkout')->name('checkout')->middleware('auth');
Route::post('/postcheckout/{detailtransaksi}', 'AllController@postcheckout')->name('postcheckout');

Route::get('/summary', 'AllController@summary')->name('summary')->middleware('auth');

Route::get('/kelola', 'AllController@kelola')->name('kelola')->middleware('auth');

Route::get('/tambah', 'AllController@tambah')->name('tambah')->middleware('auth');
Route::post('/posttambah', 'AllController@posttambah')->name('posttambah')->middleware('auth');

Route::get('/edit/{product}', 'AllController@edit')->name('edit')->middleware('auth');
Route::post('/postedit/{product}', 'AllController@postedit')->name('postedit')->middleware('auth');

Route::post('/deleteproduct/{product:id}', 'AllController@deleteproduct')->name('deleteproduct')->middleware('auth');
