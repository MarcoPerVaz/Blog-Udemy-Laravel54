<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /* 
        | -------------------------------------------------------------------------------------------------------------------------
        | *protected $dates = ['published_at']; Para especificar que el campo 'published_at' sea una instancia de la ibrería Carbon
        |   *Librería Carbon - https://carbon.nesbot.com/docs/
        | -------------------------------------------------------------------------------------------------------------------------
    */
    protected $dates = ['published_at'];
}
