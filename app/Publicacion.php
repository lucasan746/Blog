<?php

namespace App;

use App\User;
use App\Puntuacion;
use App\Comentario;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    public $table='publicaciones';
    public $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function puntaje()
    {
        return $this->hasMany(Puntuacion::class);
    }

    public function comentario()
    {
        return $this->hasMany(Comentario::class);
    }
}
