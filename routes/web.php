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

Route::get('/','HomeController@index');

Route::group(['prefix'=>'usuarios','middleware' => ['auth']], function() {
    Route::get('/', 'UsersController@index')
    ->name('usuarios.index')
    ->middleware('permission:user.list');
    Route::get('/create', 'UsersController@create')
    ->name('usuarios.create')
    ->middleware('permission:user.create');
    Route::post('/', 'UsersController@store')
    ->name('usuarios.store')
    ->middleware('permission:user.create');
    Route::get('{id}/edit', 'UsersController@edit')
    ->name('usuarios.edit')
    ->middleware('permission:user.update');
    Route::put('{id}/update', 'UsersController@update')
    ->name('usuarios.update')
    ->middleware('permission:user.update');
    Route::delete('destroy/{id}', 'UsersController@destroy')
    ->name('usuarios.destroy')
    ->middleware('permission:user.delete');
    Route::get('/profile/edit/{id}', 'UsersController@profileEdit')
    ->name('usuarios.profile.edit')
    ->middleware('permission:user.profile.update');
    Route::put('profile/{id}/update', 'UsersController@profileUpdate')
    ->name('usuarios.profile.update')
    ->middleware('permission:user.profile.update');
});

Route::group(['prefix'=>'roles','middleware' => ['auth']], function() {
    Route::get('/', 'RolesController@index')
    ->name('roles.index')
    ->middleware('permission:role.list');
    Route::get('/create', 'RolesController@create')
    ->name('roles.create')
    ->middleware('permission:role.create');
    Route::post('/', 'RolesController@store')
    ->name('roles.store')
    ->middleware('permission:role.create');
    Route::get('{id}/edit', 'RolesController@edit')
    ->name('roles.edit')
    ->middleware('permission:role.update');
    Route::put('{id}/update', 'RolesController@update')
    ->name('roles.update')
    ->middleware('permission:role.update');
    Route::delete('destroy/{id}', 'RolesController@destroy')
    ->name('roles.destroy')
    ->middleware('permission:role.delete');
});

Route::group(['prefix'=>'permisos','middleware' => ['auth']], function() {
    Route::get('/', 'PermissionsController@index')
    ->name('permisos.index')
    ->middleware('permission:permission.list');
    Route::get('/create', 'PermissionsController@create')
    ->name('permisos.create')
    ->middleware('permission:permission.create');
    Route::post('/', 'PermissionsController@store')
    ->name('permisos.store')
    ->middleware('permission:permission.create');
    Route::get('{id}/edit', 'PermissionsController@edit')
    ->name('permisos.edit')
    ->middleware('permission:permission.update');
    Route::put('{id}/update', 'PermissionsController@update')
    ->name('permisos.update')
    ->middleware('permission:permission.update');
    Route::delete('destroy/{id}', 'PermissionsController@destroy')
    ->name('permisos.destroy')
    ->middleware('permission:permission.delete');
});

Route::group(['prefix'=>'bahia','middleware' => ['auth']], function() {
    Route::get('/', 'BahiaAlDiaController@index')
    ->name('bahia.index')
    ->middleware('permission:bahia.list');
});

Route::group(['prefix'=>'viviendas','middleware' => ['auth']], function() {
    Route::get('/', 'ViviendasController@index')
    ->name('viviendas.index')
    ->middleware('permission:vivienda.list');
    Route::get('{id}/show', 'ViviendasController@show')
    ->name('viviendas.show')
    ->middleware('permission:vivienda.read');
});

Route::group(['prefix'=>'cuenta-contable','middleware' => ['auth']], function() {
    Route::get('/', 'CtaContController@index')
    ->name('cuenta-contable.index')
    ->middleware('permission:cuenta-contable');
});

Route::group(['prefix'=>'estado-cuenta','middleware' => ['auth']], function() {
    Route::get('/', 'EdoCtaController@index')
    ->name('estado-cuenta.index')
    ->middleware('permission:estado-cuenta');
});//cuenta-contable

Route::group(['prefix'=>'import-users','middleware' => ['auth']], function() {
    Route::get('/', 'ImportUsersController@index')
    ->name('import.users.index')
    ->middleware('permission:import.csv');
    Route::post('/', 'ImportUsersController@importUsersCsv')
    ->name('import.users.csv')
    ->middleware('permission:import.csv');
});

Route::group(['prefix'=>'import-vivienda','middleware' => ['auth']], function() {
    Route::get('/', 'ImportViviendasController@index')
    ->name('import.vivienda.index')
    ->middleware('permission:import.csv');
    Route::post('/', 'ImportViviendasController@importViviendaCsv')
    ->name('import.vivienda.csv')
    ->middleware('permission:import.csv');
});

Route::group(['prefix'=>'import-edocta','middleware' => ['auth']], function() {
    Route::get('/', 'ImportEdoCtaController@index')
    ->name('import.edocta.index')
    ->middleware('permission:import.csv');
    Route::post('/', 'ImportEdoCtaController@importEdoCtaCsv')
    ->name('import.edocta.csv')
    ->middleware('permission:import.csv');
});

Route::group(['prefix'=>'import-ctacont','middleware' => ['auth']], function() {
    Route::get('/', 'ImportCtaContController@index')
    ->name('import.ctacont.index')
    ->middleware('permission:import.csv');
    Route::post('/', 'ImportCtaContController@importCtaContCsv')
    ->name('import.ctacont.csv')
    ->middleware('permission:import.csv');
});

Route::group(['prefix'=>'import-bahia','middleware' => ['auth']], function() {
    Route::get('/', 'ImportBahiaController@index')
    ->name('import.bahia.index')
    ->middleware('permission:import.csv');
    Route::post('/', 'ImportBahiaController@importBahiaCsv')
    ->name('import.bahia.csv')
    ->middleware('permission:import.csv');
});


Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
//->middleware('auth', 'role:admin');
Route::get('/bdrefresh', function() {
    Artisan::call('migrate:refresh --seed');
    return "Refresh Data Base";
});
//php artisan migrate:refresh --seed


