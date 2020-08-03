<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasManyThrough('App\Comment', 'App\Post', 'post_id', 'id');
    }
}
