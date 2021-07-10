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
use App\barang;

Route::get('/', function () {
    return view('about');
});

Route::get('/tes', function () {
    dd('teset');
});

Route::group(['prefix' => 'barang'], function () {
    Route::post('/create', 'BarangController@create');
    Route::post('/edit/{id}', 'BarangController@edit');
    Route::get('/data', 'BarangController@data');
    Route::get('/delete/{id}', 'BarangController@delete');
    Route::get('/img/{id}', 'BarangController@img');
    Route::get('/index',function () {
        return view('index');
    });
});

Route::get('storage/{filename}', function ($filename)
{
    return barang::make(storage_path('public/' . $filename))->response();
});
