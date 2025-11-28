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
        'estado',
        'avatar',
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
    public function clients()
    {
        return $this->hasMany(Client::class);
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

        // Cuando se actualiza
        static::updating(function ($foto) {

           
            $campos = ['imagen', 'avatar'];

            foreach ($campos as $campo) {
                if ($foto->isDirty($campo)) {
                    $original = $foto->getOriginal($campo);

                    if ($original && Storage::disk('public')->exists($original)) {
                        Storage::disk('public')->delete($original);
                    }
                }
            }
        });

       
        static::deleting(function ($foto) {

            $campos = ['imagen', 'avatar'];

            foreach ($campos as $campo) {
                $archivo = $foto->{$campo};

                if ($archivo && Storage::disk('public')->exists($archivo)) {
                    Storage::disk('public')->delete($archivo);
                }
            }
        });
    }

    public function assignUser(int $userId): self
    {
        $this->users()->syncWithoutDetaching([$userId]);

        return $this;
    }
}
