<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nombre',
        'detalle',
        'request_id',
        'fechainicio',
        'fechafin',
        'estado',
        
    ];
    //relaciones
    public function request(){
        return $this->belongsTo(Request::class);
    }
    public function task(){
        return $this->hasMany(Task::class);
    }
    
}
