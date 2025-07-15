<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskRequired extends Model
{
    protected $fillable = [
        'task_id',
        'service_id',
        'descripcion',
        'estado',
        'respuesta',
    ];
    //relaciones
        public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
