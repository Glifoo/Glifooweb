<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Byproduct extends Model
{
    protected $fillable = [
        'nombre',
        'costo',
        'descripcion',
        'product_id',
    ];

    // Relaciones
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //
        public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
