<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskArchive extends Model
{
    protected $fillable = [
        'task_id',
        'file_path',
        'file_name',
        'description',
        'user_id',
    ];
    //relaciones
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
