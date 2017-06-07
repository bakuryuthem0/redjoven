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

Route::get('/','HomeController@getIndex');
Route::get('quienes-somos','HomeController@getAbout');
Route::get('noticias','NewsController@getPlainNews');
Route::get('noticias/{id}','NewsController@getNews');
Route::get('noticias/{sede_id}/{cat_id}','NewsController@getNewsCat');
Route::get('noticia/leer/{id}','NewsController@getNewSelf');

Route::get('galeria','HomeController@getGallery');
Route::get('galeria/{id}','HomeController@showGallery');

Route::get('contactenos','HomeController@getContact');
Route::post('contactenos/enviar','HomeController@postContact');

Route::group(array('before' => 'no_auth'),function() 
{
	Route::get('administrador/login', 'AdminController@getLogin');
	Route::group(array('before' => 'csrf'),function(){
		Route::post('administrador/login/enviar','AdminController@postLogin');
	});
});

Route::group(array('before' => 'auth'),function() 
{
	Route::get('administrador/', 'AdminController@getIndex');
	Route::get('administrador/change-password','AdminController@getChangePass');
	Route::post('administrador/change-password/send','AdminController@postUserNewPass');

	Route::get('administrador/buscar-sedes-o-proyectos','AdminController@getProy');

	//articulos
	Route::get('administrador/nuevo-articulo','AdminController@getNewArticulo');
	Route::post('administrador/nuevo-articulo/enviar','AdminController@postNewArticulo');

	Route::get('administrador/ver-articulo/{id}','AdminController@showArt');
	Route::get('administrador/mostrar-articulos','AdminController@showArticulos');
	Route::get('administrador/mostrar-articulos/{id}','AdminController@getArticulo');
	Route::post('administrador/mostrar-articulo/{id}/enviar','AdminController@postArticulo');

	Route::get('administrador/editar-articulo/{id}','AdminController@getModifyArt');
	Route::post('administrador/ver-articulo/enviar','AdminController@postMdfArt');
	Route::post('administrador/ver-articulos/eliminar-imagen','AdminController@elimImg');
	Route::post('administrador/mostrar-articulos/eliminar','AdminController@elimArticulo');
	Route::post('administrador/cambiar-estado','AdminController@changeStatus');
	//usuarios
	Route::get('administrador/nuevo-usuario','AdminController@newUser');
	Route::post('administrador/nuevo-usuario/enviar','AdminController@postNewUser');
	Route::get('administrador/ver-usuarios','AdminController@getUsers');
	Route::post('administrador/ver-usuarios/eliminar','AdminController@elimUser');
	Route::get('administrador/cambiar-password/{id}','AdminController@chageUserPass');
	Route::post('administrador/cambiar-password/enviar/{id}','AdminController@postChangePass');

	//Sedes
	Route::get('administrador/nueva-sede','AdminController@getSedes');
	Route::post('administrador/nueva-sede/enviar','AdminController@postSedes');
	Route::get('administrador/ver-sedes','AdminController@getShowSedes');
	Route::get('administrador/editar-sede/{id}','AdminController@getModifySede');
	Route::post('administrador/editar-sede/{id}/enviar','AdminController@postMdfSede');
	Route::post('administrador/mostrar-sedes/eliminar','AdminController@elimSede');
	Route::get('administrador/mostrar-sedes/ver-asignados/{id}','AdminController@getAssign');
	Route::post('administrador/ver-sedes/remover-asignacion','AdminController@elimAssign');
	Route::get('administrador/mostrar-sedes/asignar-nuevo/{id}','AdminController@getNewAssign');
	Route::post('administrador/mostrar-sedes/asignar-nuevo/{id}/enviar','AdminController@postNewAssign');

	Route::post('administrador/ver-productos/eliminar','AdminController@elimItem');
	
	Route::get('administrador/nueva-imagen','AdminController@newImage');
	Route::post('administrador/nueva-imagen/galeria/enviar','AdminController@postImg');
	Route::get('administrador/ver-galerias','AdminController@getElimImg');
	Route::get('administrador/ver-galeria/{id}','AdminController@galleryImages');
	Route::post('administrador/ver-galeria/eliminar','AdminController@postElimImg');

	Route::get('administrador/logout','AdminController@getLogOut');
	Route::get('administrador/test-interv','AdminController@getTest');
});
