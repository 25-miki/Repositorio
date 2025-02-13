<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruta extends Model
{

    protected $fillable = [
        'nombre',
        'foto',
        'estacion',
        'precio',
        'unidades',
    ];
}
