<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskdependency extends Model
{
    //
    protected $fillable = [
        'task_id',
        'taskdependens_on_task_id',
    ];
    // Relaciones
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function taskdependency(){
        return $this->hasMany(Task::class);
}
}