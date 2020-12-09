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
    Route::get('/plans/{url}/details/create', 'DetailPlanController@create')->name('plan.details.create');
    Route::post('/plans/{url}/details', 'DetailPlanController@store')->name('plan.details.store');
    Route::get('/plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('plan.details.edit');
    Route::put('/plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('plan.details.update');
    Route::get('/plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('plan.details.show');
    Route::delete('/plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('plan.details.destroy');
    
    //Planos
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::post('/plans', 'PlanController@store')->name('plans.store');
    Route::get('/plans/create', 'PlanController@create')->name('plans.create');
    Route::get('/plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('/plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::put('/plans/{url}', 'PlanController@update')->name('plans.update');
    Route::delete('/plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::any('/admins/plans/search', 'PlanController@search')->name('plans.search');

    //Perfis
    Route::resource('profiles', 'ACL\ProfileController');
    Route::any('/admins/profiles/search', 'ACL\ProfileController@search')->name('profiles.search');

    //Permissoes
    Route::resource('permissions', 'ACL\PermissionController');
    Route::any('/admins/permissions/search', 'ACL\PermissionController@search')->name('permissions.search');

    //Permissoes do Perfil
    Route::get('profile/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profile.permissions');
    Route::get('profile/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailableProfile')->name('profile.permissions.available');
    Route::post('profile/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profile.permissions.attach');
});