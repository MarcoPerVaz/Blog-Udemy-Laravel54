<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------
        | *Permite al usuario ver un post que le pertenezca
        | *return $user->id === $post->user_id; Autoriza si el 'id' del usuario autenticado es igual al 'id' del usuario en la tabla 'posts'
        | ----------------------------------------------------------------------------------------------------------------------------------
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
    /* 
        | ------------------------------------------------------------
        | *Permite al usuario crear un post
        | *return true; Verdadero el usuario puede crear un nuevo post
        | ------------------------------------------------------------
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
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------
        | *Permite al usuario actualizar un post que le pertenezca
        | *return $user->id === $post->user_id; Autoriza si el 'id' del usuario autenticado es igual al 'id' del usuario en la tabla 'posts'
        | ----------------------------------------------------------------------------------------------------------------------------------
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
    /* 
        | ----------------------------------------------------------------------------------------------------------------------------------
        | *Permite al usuario eliminar un post que le pertenezca
        | *return $user->id === $post->user_id; Autoriza si el 'id' del usuario autenticado es igual al 'id' del usuario en la tabla 'posts'
        | ----------------------------------------------------------------------------------------------------------------------------------
    */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}


/* Notas:
    | ----------------------------------------------------------------------------------------------------------
    | *Más información sobre Policies o Políticas en https://laravel.com/docs/5.5/authorization#writing-policies
    | ----------------------------------------------------------------------------------------------------------
*/
