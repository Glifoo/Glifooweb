<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'service_id',
    ];
    //relaciones
        public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
