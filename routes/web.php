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

Route::get('/{any?}', function () {
    return view('welcome');
});

Route::get('/api/products', function(){

    return App\Models\Product::latest()->get();

});

Route::get('/api/quotes', function() {

    return App\Models\Quote::latest()->get();
});

