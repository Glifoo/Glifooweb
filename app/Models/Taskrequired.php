<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskrequired extends Model
{
    //
    protected $fillable = [
        'task_id',
        'user_id',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    // Relaciones
    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function service(){
        return $this->hasMany(Service::class);
    }
}
