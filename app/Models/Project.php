<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'user_id',
        'request_id',

    ];
    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    
}
