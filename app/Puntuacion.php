<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publicacion;
use App\User;

class Puntuacion extends Model
{
    public $table='puntuacion';
    public $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class);
    }
}
