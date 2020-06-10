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


Route::get('/series','seriesController@index')
->name('listar_series');

Route::get('/series/criar', 'SeriesController@criar')
->name('form_criar_serie');

Route::post('/series/criar', 'SeriesController@store')
->name('criar_serie');

Route::delete('/series/{id}', 'SeriesController@destroy')
->name('deletar_serie');

Route::get('/series/{serieId}/temporadas','TemporadasController@index');
