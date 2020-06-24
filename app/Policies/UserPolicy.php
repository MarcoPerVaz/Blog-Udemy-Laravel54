<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /* 
        | -----------------------------------------------------------------------------------------------------------
        | *La función before($user) se ejecuta antes que cualquier otra función de la Policy
        | *if ($user->hasRole('Admin')) Verifica si el usuario autenticado tiene el role de 'Admin'
        |   *Si tiener el role 'Admin' permite todo el acceso a la información y operaciones sobre todos los usuarios
        | -----------------------------------------------------------------------------------------------------------
    */
    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    /* 
        | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Permite poder ver a los usuarios registrados
        | *$authUser->id === $user->id || $user->hasPermissionTo('View users'); Compara el usuario autenticado con el usuario que se intenta ver o que tenga el permiso para ver usuarios 'View Users'
        |   *|| Condicional or u o
        | *view(User $authUser, User $user) Una variable $authUserpara el usuario autenticado y $user que es el usuario que se intent ver
        | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('View users');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    /* 
        | --------------------------------------------------------------------------------------------
        | *Permite poder crear usuarios
        | *$user->hasPermissionTo('Create users'); Da permiso para poder crear usuarios 'Create users'
        | --------------------------------------------------------------------------------------------
    */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    /* 
        | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Permite poder actualizar usuarios
        | *$authUser->id === $user->id || $user->hasPermissionTo('Update users'); Compara el usuario autenticado con el usuario que se intenta actualizar o que tenga el permiso para actualizar usuarios 'Update users'
        |   *|| Condicional or u o
        | *update(User $authUser, User $user) Una variable $authUserpara el usuario autenticado y $user que es el usuario que se intenta actualizar
        | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Update users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *Permite poder eliminar a los usuarios
        | *$authUser->id === $user->id || $user->hasPermissionTo('Delete users'); Compara el usuario autenticado con el usuario que se intenta eliminar o que tenga el permiso para eliminar usuarios 'Delete users'
        |   *|| Condicional or u o
        | *delete(User $authUser, User $user) Una variable $authUser para el usuario autenticado y $user que es el usuario que se intenta eliminar
        | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function delete(User $user, User $model)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Delete users');
    }
}
