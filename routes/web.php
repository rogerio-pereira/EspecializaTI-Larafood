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

Route::get('/admin/plans', 'Admin\PlanController@index')->name('admin.plans.index');
Route::post('/admin/plans', 'Admin\PlanController@store')->name('admin.plans.store');
Route::get('/admin/plans/create', 'Admin\PlanController@create')->name('admin.plans.create');
Route::get('/admin/plans/{url}', 'Admin\PlanController@show')->name('admin.plans.show');
Route::delete('/admin/plans/{url}', 'Admin\PlanController@destroy')->name('admin.plans.destroy');