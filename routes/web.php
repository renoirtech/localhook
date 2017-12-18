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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'bins'], function(){
    Route::get(''                , 'BinController@index')   ->name('bins.index');
    Route::get('/create'         , 'BinController@create')  ->name('bins.create');
    Route::post(''               , 'BinController@store')   ->name('bins.store');
    Route::get('{uuid}'           , 'BinController@show')    ->name('bins.show');
    Route::get('{uuid}/edit'      , 'BinController@edit')    ->name('bins.edit');
    Route::put('{uuid}'           , 'BinController@update')  ->name('bins.update');
    Route::get('/destroy/{uuid}'  , 'BinController@destroy') ->name('bins.destroy');
});

Route::group(['prefix' => 'requests'], function(){
    Route::any('/bin/{uuid}'         , 'BinRequestController@receive')        ->name('requests.receive');
    Route::get(''                    , 'BinRequestController@index')          ->name('requests.index');
    Route::get('/create'             , 'BinRequestController@create')         ->name('requests.create');
    Route::post(''                   , 'BinRequestController@store')          ->name('requests.store');
    Route::get('{request}'           , 'BinRequestController@show')           ->name('requests.show');
    Route::get('{request}/edit'      , 'BinRequestController@edit')           ->name('requests.edit');
    Route::put('{request}'           , 'BinRequestController@update')         ->name('requests.update');
    Route::get('/destroy/{request}'  , 'BinRequestController@destroy')        ->name('requests.destroy');
});

//Route::group(['prefix' => 'environments'], function(){
//    Route::get(''                           , 'EnvironmentController@index')          ->name('environments.index');
//    Route::get('/create'                    , 'EnvironmentController@create')         ->name('environments.create');
//    Route::post(''                          , 'EnvironmentController@store')          ->name('environments.store');
//    Route::get('{uuid}'                     , 'EnvironmentController@show')           ->name('environments.show');
//    Route::get('{uuid}/edit'                , 'EnvironmentController@edit')           ->name('environments.edit');
//    Route::put('{uuid}'                     , 'EnvironmentController@update')         ->name('environments.update');
//    Route::get('/destroy/{uuid}'            , 'EnvironmentController@destroy')        ->name('environments.destroy');
//});
