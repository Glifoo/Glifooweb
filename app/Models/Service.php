<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nombre',
    ];
    
    // relaciones

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
