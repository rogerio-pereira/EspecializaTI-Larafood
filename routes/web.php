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

Route::group([
    'prefix' => '/admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
], function(){
    //Dashoboard
    Route::get('/', 'PlanController@index')->name('index');

    //Detalhes dos Planos
    Route::get('/plans/{url}/details', 'DetailPlanController@index')->name('plan.details.index');
    
    //Planos
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::post('/plans', 'PlanController@store')->name('plans.store');
    Route::get('/plans/create', 'PlanController@create')->name('plans.create');
    Route::get('/plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('/plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::put('/plans/{url}', 'PlanController@update')->name('plans.update');
    Route::delete('/plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::any('/admins/plans/search', 'PlanController@search')->name('plans.search');
});