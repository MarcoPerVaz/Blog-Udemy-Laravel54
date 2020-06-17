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
    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}