<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['content', 'post_id', 'user_id'];
    /*
    * この答えを所有するユーザ
    **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * この答えが所有する投稿
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * この答えが所有する参考になった
     */
    public function likes()
    {
        return $this->hasMany(Post::class);
    }
}
