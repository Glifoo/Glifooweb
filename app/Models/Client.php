<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'contenido',
    ];
    // Relaciones

      public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
