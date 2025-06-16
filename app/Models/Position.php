<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'nombre',
        'funcion',
        'service_id'
    ];


    // relaciones
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
