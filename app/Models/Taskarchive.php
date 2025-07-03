<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskarchive extends Model
{
    protected $fillable = [
        'descripcion',
        'rutaarchivo',
        'nombrearchivo',
        'task_id',
    ];
        public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
