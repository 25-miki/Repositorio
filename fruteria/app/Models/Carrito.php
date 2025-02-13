<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = [
        'user_id',  // Campo del usuario
        'fruta_id', // Campo de la fruta
        'cantidad', // Cantidad de frutas
    ];

    public function fruta(){
        return $this->belongsTo(Fruta::class, 'fruta_id');
    }
}
