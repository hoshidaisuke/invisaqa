<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];
    
    /*
    * この投稿を所有するユーザ
    **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * この投稿に対する回答
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }    
    
}
