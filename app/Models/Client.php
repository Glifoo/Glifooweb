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
        'funcion',
        'service_id',
    ];
    //relaciones

        public function request()
    {
        return $this->hasOne(Request::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
