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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/myclass', 'ClassController@index');
Route::post('/myclass/store', 'ClassController@store');
Route::post('/myclass/update', 'ClassController@update');
Route::post('/myclass/destroy', 'ClassController@destroy');
Route::get('/myclass/getclassstd/{clasID}', 'ClassController@getclassstd');

Route::get('/mystudent', 'StudentController@index');
Route::post('/mystudent/store', 'StudentController@store');
Route::post('/mystudent/update', 'StudentController@update');
Route::post('/mystudent/destroy', 'StudentController@destroy');
Route::get('/mystudent/getdatacount/{std_clasID}', 'StudentController@getdatacount');