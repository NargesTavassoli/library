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
    return view('book.create');
});

Route::get('/home', 'BookController@index')->name('home');


//Route::get('/relation', 'HomeControllerOld@relation');



//Route::get('/home', [App\Http\Controllers\HomeControllerOld::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('book')->group(function (){

    Route::get('/create', 'BookController@create');
    Route::post('/create', 'BookController@create')->name('book.create');

    Route::get('edit/{id?}', 'BookController@edit');
    Route::post('edit/{id?}', 'BookController@edit')->name('book.edit');

    Route::get('delete/{id}', 'BookController@delete');

    Route::get("/history", 'BookController@history');

    Route::get("/validation", 'StockController@validation');
});



