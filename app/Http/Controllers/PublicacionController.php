<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Publicacion;

class PublicacionController extends Controller
{
    public function getPublicaciones()
    {
        if (auth()->user()) {
            if (auth()->user()->rol==1) {
                $pub=Publicacion::Where('revision', '0')->paginate(5);
                $vac=compact('pub');
                return view('admin', $vac);
            } else {
                $pub=Publicacion::all()->sortByDesc('id');
                $vac=compact('pub');
                return view('welcome', $vac);
            }
        }
    }

    public function agregarPublicacion(request $form)
    {
        $ruta=$form->file('img')->store('public');
        $image=basename($ruta);
        $newPub=new Publicacion();
        $newPub->titulo=$form["titulo"];
        $newPub->texto=$form["texto"];
        $newPub->img=$image;
        $newPub->user_id=$form["user_id"];
        $newPub->save();
        return redirect('/');
    }

    public function verPublicacion($id)
    {
        $pub=Publicacion::find($id);
        $vac=compact('pub');
        return view('publicacion', $vac);
    }

    public function borrar(request $form)
    {
        $pub=Publicacion::find($form["id"]);
        $pub->delete();
        return redirect('/');
    }

    public function revision(request $form)
    {
        $pub=Publicacion::find($form["id"]);
        $pub->revision=1;
        $pub->save();
        return redirect('/');
    }
}
