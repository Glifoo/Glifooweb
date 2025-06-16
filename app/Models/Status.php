<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'nombre',
    ];
    // Relaciones

     public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
