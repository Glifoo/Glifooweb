<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'detalle',
        'fecha',
        'request_id',
        'status_id',
    ];
    //relaciones
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
