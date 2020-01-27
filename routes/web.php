<?php

Route::get('/', 'PublicacionController@getPublicaciones');

Auth::routes();

Route::get('/post', function () {
    return view('publicaciones');
})->middleware('auth')->name('post');

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::post('/newpost', 'PublicacionController@agregarPublicacion')->name('newpost');

Route::get('/post/{id}', 'PublicacionController@verPublicacion')->name('publi');

Route::post('/puntaje', 'PuntuacionController@puntuar')->name('puntaje');

Route::post('/borrar', 'PublicacionController@borrar');

Route::post('/revision', 'PublicacionController@revision');

Route::post('/comentario', 'ComentarioController@agregarComentario');
