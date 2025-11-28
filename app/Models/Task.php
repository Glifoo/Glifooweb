<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'nombre',
        'detalle',
        'estado',
        'fechainicio',
        'fechafin',
        'project_id',
    ];
    //relaciones
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function taskrequired()
    {
        return $this->hasMany(TaskRequired::class);
    }
    public function taskarchive()
    {
        return $this->hasOne(TaskArchive::class);
    }
    //relaciones de muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
