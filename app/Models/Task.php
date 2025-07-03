<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'fechainicio',
        'fechafin',
        'fechaentrega',
        'project_id',
        'user_id',
    ];
    // Relaciones

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function taskarchive(){
        return $this->hasOne(Taskarchive::class);
    }
    public function taskrequired()
    {
        return $this->hasMany(Taskrequired::class);
    }
    //dependencias de tareas
    public function dependencies(): belongsToMany
    {
        return $this->belongsToMany(
            Task::class,
            'taskdependencies',
            'task_id',
            'depends_on_task_id'
            );
    }
    public function dependentTasks(): belongsToMany
    {
        return $this->belongsToMany(
            Task::class,
            'taskdependencies',
            'depends_on_task_id',
            'task_id'
            );
    }

}
