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

//Route::get('/', function () {
//    return view('index');
//});

//route guest (siapa aja bisa akses tanpa harus login)
Route::get('/', 'index@index');
Auth::routes();
Route::get('/am', 'amController@index');
Route::get('/pelanggan', 'pelangganController@index');
Route::get('/home', 'HomeController@index');
//akhir dari route guest


//    Route menu yg butuh otentikasi admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('/layanan', 'layananController');
    Route::resource('/transaksi', 'transaksiController');
    Route::resource('/am', 'amController', [
        'except' => ['index']
    ]);
    Route::resource('/pelanggan', 'pelangganController', [
        'except' => ['index']
    ]);
});
//akhir route yang butuh otentikasi admin