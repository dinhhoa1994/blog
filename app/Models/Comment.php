<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'status',
    ];

    protected $table = 'comments';


    /**
     * Get the post that owns the comment.
     *
     * @return post
     */
    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    /**
     * Get the post that owns the user.
     *
     * @return user
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
