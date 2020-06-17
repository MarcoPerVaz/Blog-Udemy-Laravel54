<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}


/* Notas:
    | ------------------------------------------------------------------------------
    | *No olvidar importar use Spatie\Permission\Traits\HasRoles;
    | *No olvidar importar el trait use Notifiable, HasRoles; (Notifiable ya existe)
    | ------------------------------------------------------------------------------
*/