<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'intro',
        'content',
        'image',
        'tag',
        'description',
        'count_comment',
        'slug'
    ];

    /**
     * Get the category that owns the post.
     *
     * @return category
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    /**
     * Get the comments for the post.
     *
     * @return comments
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
