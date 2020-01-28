<?php

namespace App\Http\Controllers;

use App\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function getPublicaciones()
    {
        if (auth()->user()) {
            if (auth()->user()->rol == 1) {
                $pub = Publicacion::Where('revision', '0')->paginate(5);
                $vac = compact('pub');
                return view('admin', $vac);
            } else {
                $pub = Publicacion::all()->sortByDesc('id');
                $vac = compact('pub');
                return view('welcome', $vac);
            }
        } else {
            $pub = Publicacion::all()->sortByDesc('id');
            $vac = compact('pub');
            return view('welcome', $vac);
        }
    }

    public function agregarPublicacion(request $form)
    {
        $ruta = $form->file('img')->store('public');
        $image = basename($ruta);
        $newPub = new Publicacion();
        $newPub->titulo = $form["titulo"];
        $newPub->texto = $form["texto"];
        $newPub->img = $image;
        $newPub->user_id = $form["user_id"];
        $newPub->save();
        return redirect('/home');
    }

    public function verPublicacion($id)
    {
        $pub = Publicacion::find($id);
        $vac = compact('pub');
        return view('publicacion', $vac);
    }

    public function borrar(request $form)
    {
        $pub = Publicacion::find($form["id"]);
        $pub->delete();
        return redirect('/home');
    }

    public function revision(request $form)
    {
        $pub = Publicacion::find($form["id"]);
        $pub->revision = 1;
        $pub->save();
        return redirect('/home');
    }

    public function newEdit(request $form)
    {
        $pub = Publicacion::find($form["id"]);
        $vac = compact('pub');
        return view('nuevaPublicacion', $vac);
    }

    public function editar(request $form)
    {
        $pub = Publicacion::find($form["id"]);
        if ($form["titulo"]) {
            $pub->titulo = $form["titulo"];
        }
        if ($form["texto"]) {
            $pub->texto = $form["texto"];
        }
        if ($form->file('img')) {
            $ruta = $form->file('img')->store('public');
            $image = basename($ruta);
            $pub->img = $image;
        }
        $pub->save();
        return redirect('/post/' . $form["id"]);
    }
}
