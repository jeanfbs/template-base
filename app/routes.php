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

Route::get('/', "HomeController@getIndex");
Route::post('auth','LoginController@autenticar');
// Route::get('auth',function(){
// 	return View::make('assets.404');
// });

Route::group(array('prefix' => 'panel-control'/*,'before' => 'logado'*/),function(){
	// Menu Bar routes
	// Route::get('dashboard','DashboardController@getDashboard');
	// Route::get('logout','DashboardController@getLogout');
	// Route::get('perfil','DashboardController@getPerfil');
	
	// Route::post('perfil','DashboardController@postPerfil');
	Route::controller('/usuario', "UsuarioController");
	Route::controller('/layout', "HomeController");
	Route::controller('/paciente', "UsuarioController");
});
// Metodo utilizado igualmente para o
	// missing do controller porém aqui
	// e da propria aplicação
// App::missing(function($exception)
// {
// 	return View::make('assets.404');
// });