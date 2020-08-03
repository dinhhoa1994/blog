<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tag',
        'description',
        'icon',
        'slug',
        'create_at',
        'update_at',
    ];

    protected $table = 'categories';

    /**
     * Get the posts for the category.
     *
     * @return posts
     */

    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }

    /**
     * Get the comments for the category.
     *
     * @return comments
     */

    public function comments()
    {
        return $this->hasManyThrough('App\Comment', 'App\Post', 'post_id', 'id');
    }
}
