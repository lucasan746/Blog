<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class ComentarioController extends Controller
{
    public function agregarComentario(request $form)
    {
        $comentario = new Comentario;
        $comentario->comentario = $form['comentario'];
        $comentario->publicacion_id = $form['publicacion_id'];
        $comentario->user_id = $form['user_id'];
        $comentario->save();
        return redirect('/post/'.$form['publicacion_id']);
    }
}
