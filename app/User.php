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

    /* 
        | ---------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Mutador para encriptar la contraseña
        | *$this->attributes['password'] = bcrypt($password); Encripta a la variable $password y se la asigna al campo 'password' de la tabla 'users' de la base de datos
        | ---------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}


/* Notas:
    | -----------------------------------------------------------------------------------------------------
    | *Más información sobre mutadores en https://laravel.com/docs/5.5/eloquent-mutators#defining-a-mutator
    | *Más información sobre la función bcrypt() en https://laravel.com/docs/5.5/helpers#method-bcrypt
    | -----------------------------------------------------------------------------------------------------
*/