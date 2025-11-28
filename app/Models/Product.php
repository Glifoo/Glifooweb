<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nombre',
        'service_id',
    ];


    //relaciones
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function byproducts()
    {
        return $this->hasMany(ByProducts::class);
    }




}
