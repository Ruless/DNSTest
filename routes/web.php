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

Route::get('/', [
	'as' => 'home',
	'uses' => 'Excel\DataController@index'
]);

Route::get('/create', [
	'as' => 'create',
	'uses' => 'Excel\DataController@create'
]);

Route::post('/store', [
	'as' => 'store',
	'uses' => 'Excel\DataController@store'
]);

Route::get('/edit/{id}', [
	'as' => 'edit',
	'uses' => 'Excel\DataController@edit'
]);

Route::post('/update', [
	'as' => 'update',
	'uses' => 'Excel\DataController@update'
]);

Route::get('/show/{id}', [
	'as' => 'show',
	'uses' => 'Excel\DataController@show'
]);

Route::get('/delete/{id}', [
	'as' => 'delete',
	'uses' => 'Excel\DataController@delete'
]);

Route::get('/import', [
	'as' => 'import',
	'uses' => 'Excel\ExcelController@import'
]);

Route::post('/import', [
	'as' => 'import/data',
	'uses' => 'Excel\ExcelController@importData'
]);

Route::get('/export', [
	'as' => 'export',
	'uses' => 'Excel\ExcelController@exportData'
]);