<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class byProducts extends Model
{   protected $fillable = [
        'nombre',
        'costo',
        'descripcion',
        'product_id',
    ];
    //relaciones
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function request()
    {
        return $this->hasMany(Request::class);
    }
}