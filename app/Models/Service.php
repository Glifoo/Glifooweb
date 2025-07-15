<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
    ];

    //relaciones

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //relaciones de muchos a muchos
        public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
