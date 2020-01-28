<?php

namespace App\Http\Controllers;

use App\Publicacion;
use App\Puntuacion;
use Illuminate\Http\Request;

class PuntuacionController extends Controller
{
    public function puntuar(request $form)
    {
        $puntos = new Puntuacion;
        $puntos->publicacion_id = $form["publicacion_id"];
        $puntos->user_id = $form["user_id"];
        $puntos->puntaje = $form["puntaje"];
        $puntos->save();
        $post = Publicacion::find($form["publicacion_id"]);
        $post->puntaje_promedio = ($post->puntaje_promedio + $form["puntaje"]) / 2;
        $post->save();
        return redirect('/post/' . $form["publicacion_id"]);
    }
}
