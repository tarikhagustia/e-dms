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


Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'master'], function (){
        Route::get('/categories','Master\CategoryController@index')->name('master.category');
        Route::get('/categories/add','Master\CategoryController@add')->name('master.category.add');
        Route::post('/categories','Master\CategoryController@store')->name('master.category');
        Route::get('/categories/{id}/delete','Master\CategoryController@destroy')->name('master.category.delete');
        Route::get('/categories/{id}/edit','Master\CategoryController@edit')->name('master.category.edit');
        Route::post('/categories/{id}/edit','Master\CategoryController@update')->name('master.category.edit');

        Route::group(['prefix' => 'documents'], function (){
            Route::get('/', 'Document\DocumentController@index')->name('document');
            Route::get('/upload', 'Document\DocumentController@upload')->name('document.upload');
            Route::post('/upload', 'Document\DocumentController@store')->name('document.upload');
            Route::get('/datatable', 'Document\DocumentController@datatable')->name('document.datatable');
            Route::get('/download/{secure_id}', 'Document\DocumentController@download')->name('document.download');
        });
    });
});
