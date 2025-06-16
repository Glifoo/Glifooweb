<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
     protected $fillable = [
        'fecha',
        'estado',
        'product_id',
        'client_id',
    ];
    // Relaciones
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
