<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* 
        | -------------------------------------------------------------------------------------
        | *Relación hasMany (Tiene muchos) Un usuario puede tener muchos posts
        |   *Más información en https://laravel.com/docs/5.5/eloquent-relationships#one-to-many
        | -------------------------------------------------------------------------------------
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}


/* Notas:
    | --------------------------------------------------------------------------------------------------
    | *Más información sobre relaciones con Eloquent https://laravel.com/docs/5.5/eloquent-relationships
    | --------------------------------------------------------------------------------------------------
*/
