<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /* 
        | ----------------------------------------------------------------------------------------
        | *La función before() se ejecuta antes que cualquier otra función
        | *if ($user->hasRole('Admin')) Verifica si el usuario autenticado tiene el role 'Admin'
        |   *Si es verdadero el usuario puede ver, editar, crear y eliminar posts con return true;
        | ----------------------------------------------------------------------------------------
    */
    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------
        | *$user->id === $post->user_id || $user->hasPermissionTo('View posts');
        |   *Se usa el condicional OR - ||
        |   *$user->id === $post->user_id Si el 'id' del usuario autenticado es igual al 'id' de la tabla 'users' de la base de datos
        |   *$user->hasPermissionTo('View posts') Si el usuario autenticado tiene el permiso Ver todos los posts
        | ---------------------------------------------------------------------------------------------------------------------------
    */
    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('View posts');
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    /* 
        | --------------------------------------------------------------------------------------------------
        | *$user->hasPermissionTo('Create posts'); Si el usuario autenticado tiene el permiso de crear posts
        | --------------------------------------------------------------------------------------------------
    */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create posts');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------
        | *$user->id === $post->user_id || $user->hasPermissionTo('View posts');
        |   *Se usa el condicional OR - ||
        |   *$user->id === $post->user_id Si el 'id' del usuario autenticado es igual al 'id' de la tabla 'users' de la base de datos
        |   *$user->hasPermissionTo('View posts') Si el usuario autenticado tiene el permiso Actualizar posts
        | ---------------------------------------------------------------------------------------------------------------------------
    */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('Update posts');
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    /* 
        | ---------------------------------------------------------------------------------------------------------------------------
        | *$user->id === $post->user_id || $user->hasPermissionTo('View posts');
        |   *Se usa el condicional OR - ||
        |   *$user->id === $post->user_id Si el 'id' del usuario autenticado es igual al 'id' de la tabla 'users' de la base de datos
        |   *$user->hasPermissionTo('View posts') Si el usuario autenticado tiene el permiso Eliminar posts
        | ---------------------------------------------------------------------------------------------------------------------------
    */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->hasPermissionTo('Delete posts');
    }
}