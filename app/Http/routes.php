<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/index', ['as' => 'admin.categories.index', 'uses' => 'CategoriesController@index']);
Route::get('admin/create', ['as' => 'admin.categories.create', 'uses' => 'CategoriesController@create']);
Route::post('admin/store', ['as' => 'admin.categories.store', 'uses' => 'CategoriesController@store']);
Route::get('admin/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoriesController@edit']);
Route::post('admin/update/{id}', ['as' => 'admin.categories.update', 'uses' => 'CategoriesController@update']);
