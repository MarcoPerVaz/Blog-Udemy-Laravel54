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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /* 
        | ------------------------------------------------------------------------------------------------------------------------------------------
        | *Query scope
        | *if (auth()->user()->can('view', $this) Verifica si el usuario puede ver 'view'
        |   *'view' Es el nombre de la función view(User $authUser, User $user) de la política app\Policies\UserPolicy.php
        |   *return $query; Devuelve la consulta
        | *return $query->where('id', auth()->id()); Devuelve la consulta con la clausula where que compara el campo 'id' con el usuario autenticado
        | ------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) {
            return $query;
        }

        return $query->where('id', auth()->id());
    }
}


/* Notas:
    | ----------------------------------------------------------------------------------------
    | *Más información sobre queryscopes en https://laravel.com/docs/5.5/eloquent#query-scopes
    | ----------------------------------------------------------------------------------------
*/