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

Route::group(['middleware' => ['web','auth']], function () {

    Route::post('importar/tablas', 'ImportarController@importar')->name('importar.tablas');
    Route::get('importar/tablas', 'ImportarController@index')->name('importar.inicio');

    Route::post('exportar/tablas', 'ImportarController@exportar')->name('exportar.tablas');


    Route::get('presupuesto/{id}/rubros', 'RubroController@index')->name('rubro.index');
    Route::get('presupuesto/{id}/rubros/create', 'RubroController@create')->name('rubro.create');
    Route::post('rubros', 'RubroController@store')->name('rubro.store');
    Route::delete('rubro/{id}', 'RubroController@destroy')->name('rubro.destroy');





    // Route::get('rubros', 'RubroController@index')->name('rubro.lista');

    Route::get('bpin', 'BPinController@index')->name('bpin.index');
    Route::get('bpin/create', 'BPinController@create')->name('bpin.create');
    Route::post('bpin', 'BPinController@store')->name('bpin.store');
    Route::get('bpin/{bpin}', 'BPinController@show')->name('bpin.show');


    Route::get('cdps', 'CdpController@index')->name('cdp.index');
    Route::get('cdps/create', 'CdpController@create')->name('cdp.create');
    Route::post('cdps', 'CdpController@store')->name('cdp.store');
    Route::get('cdps/autorizaciones', 'CdpController@autorizaciones')->name('cdp.autorizaciones');
    Route::post('cdps/autorizar', 'CdpController@autorizar')->name('cdp.autorizar');

    Route::get('pubs-padres', 'PubController@padres')->name('pubs.padres');



    Route::get('presupuesto/{id}', 'VigenciaController@presupuesto')->name('presupuesto.historial');

    Route::get('vigencia/create', 'VigenciaController@create')->name('vigencia.create');
    Route::post('vigencia', 'VigenciaController@store')->name('vigencia.store');


    Route::delete('presupuesto/{id}', 'VigenciaController@destroy')->name('presupuesto.destroy');
    Route::get('presupuesto/{id}/edit/{tipo}', 'VigenciaController@edit')->name('presupuesto.edit');
    Route::put('presupuesto/{id}', 'VigenciaController@update')->name('presupuesto.update');



});
