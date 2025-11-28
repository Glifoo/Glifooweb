<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'fecha',
        'estado',
        'by_product_id',
        'client_id',
    ];
    //relaciones
    public function byProduct()
    {
        return $this->belongsTo(ByProducts::class);
    }
    public function sale(){
        return $this->hasOne(Sale::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function project(){
        return $this->hasOne(Project::class);
    }
    
}
