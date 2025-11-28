<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'nombre',
    ];
    //relaciones
    public function sales()
    {
        return $this->hasOne(Sale::class);
    }
}
