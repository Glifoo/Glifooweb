<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto_perfil',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
//metodos

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($foto) {

            if ($foto->isDirty('foto_perfil')) {
                Storage::disk('public')->delete('/' . $foto->getOriginal('foto_perfil'));
            }
        });

        static::deleting(function ($foto) {
            if ($foto->foto_perfil) {
                Storage::disk('public')->delete($foto->foto_perfil);
            }
        });
    }

// relaciones
    
    public function service(){
        return $this->belongsTo(Service::class);
    }
    //
    public function task(){
        return $this->hasMany(Task::class);
    }
    public function project(){
        return $this->hasMany(Project::class);
    } 

}
