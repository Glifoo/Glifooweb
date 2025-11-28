<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'service_id',
    ];

//metodos

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($imagen) {

            if ($imagen->isDirty('imagen')) {
                Storage::disk('public')->delete('/' . $imagen->getOriginal('imagen'));
            }
        });

        static::deleting(function ($imagen) {
            if ($imagen->imagen) {
                Storage::disk('public')->delete($imagen->imagen);
            }
        });
    }

    //relaciones
        public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
}
