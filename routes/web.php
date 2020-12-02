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
    'namespace' => 'Admin'
], function(){
    Route::get('/', 'PlanController@index')->name('admin.index');
    
    Route::get('/plans', 'PlanController@index')->name('admin.plans.index');
    Route::post('/plans', 'PlanController@store')->name('admin.plans.store');
    Route::get('/plans/create', 'PlanController@create')->name('admin.plans.create');
    Route::get('/plans/{url}', 'PlanController@show')->name('admin.plans.show');
    Route::get('/plans/{url}/edit', 'PlanController@edit')->name('admin.plans.edit');
    Route::put('/plans/{url}', 'PlanController@update')->name('admin.plans.update');
    Route::delete('/plans/{url}', 'PlanController@destroy')->name('admin.plans.destroy');
    Route::any('/admins/plans/search', 'PlanController@search')->name('admin.plans.search');
});