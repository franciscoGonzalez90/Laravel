<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('id','[0-9]+');

Route::group(['before'=>'csrf'],function(){
    Route::post('login','LoginController@login');
});


Route::get('/','HomeController@showWelcome');

Route::get('logout','LoginController@logout');

Route::group(['before' => 'auth'], function()
{
  Route::group(['before'=>'csrf'],function(){
      Route::put('actualizarUsuario/{id}','HomeController@actualizarUsuario');
      Route::post('guardarUsuario','HomeController@guardarUsuario');
  });
    // Route::get('/', 'HomeController@showWelcome');
    Route::get('dashboard',['uses'=>'LoginController@dashboard','as'=>'home']);
    Route::get('crearUsuario','HomeController@crearUsuario');
    Route::get('modificarUsuario/{id}','HomeController@modificarUsuario');
    Route::get('verUsuarios','HomeController@getAllUsuarios');
    Route::get('verUsuario/{id}','HomeController@getOneUsuario');
    Route::get('eliminarUsuario/{id}','HomeController@eliminarUsuario');
});
