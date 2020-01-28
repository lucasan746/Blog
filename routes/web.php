<?php

Route::get('/home', 'PublicacionController@getPublicaciones');

Route::get('/', 'PublicacionController@getPublicaciones');

Auth::routes();

Route::get('/post', function () {
    return view('nuevaPublicacion');
})->middleware('auth')->name('post');

Route::get('/edit', 'PublicacionController@newEdit')->name('edit')->middleware('auth');

Route::post('/newpost', 'PublicacionController@agregarPublicacion')->name('newpost');

Route::get('/post/{id}', 'PublicacionController@verPublicacion')->name('publi');

Route::post('/puntaje', 'PuntuacionController@puntuar')->name('puntaje');

Route::post('/borrar', 'PublicacionController@borrar');

Route::post('/revision', 'PublicacionController@revision');

Route::post('/comentario', 'ComentarioController@agregarComentario');

Route::post('/edit', 'PublicacionController@editar');
