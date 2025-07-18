<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
    ];

    //relaciones

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    //relaciones de muchos a muchos

    public function users()
    {
        return $this
            ->belongsToMany(
                User::class,
                'serviceuser',
                'service_id',
                'user_id'
            )
            ->withTimestamps();
    }
    //metodos
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($foto) {

            if ($foto->isDirty('imagen')) {
                Storage::disk('public')->delete('/' . $foto->getOriginal('imagen'));
            }
        });

        static::deleting(function ($foto) {
            Storage::disk('public')->delete($foto->imagen);
        });
    }

    public function assignUser(int $userId): self
    {
        $this->users()->syncWithoutDetaching([$userId]);

        return $this;
    }
}
