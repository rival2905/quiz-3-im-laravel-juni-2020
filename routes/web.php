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


// Route::get('/artikel', 'ArticleController@index');
// Route::get('/artikel/create', 'ArticleController@create');
// Route::post('/artikel', 'ArticleController@store');
// Route::get('/artikel/{id}/edit', 'ArticleController@edit');
// Route::put('/artikel/{id}', 'ArticleController@update');
// Route::get('/artikel/{id}', 'ArticleController@show');

// Route::delete('/artikel/{id}', 'ArticleController@destroy');

// Route::get('/artikel/delete/{id}', 'ArticleController@destroy');
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('artikel', 'ArticleController');
    Route::get('/', function(){
        return View('welcome');
     });
    
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test-dompdf', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

route::get('/test-dompdf-2', 'PdfController@test');

route::get('/test-excel', 'PostController@export');