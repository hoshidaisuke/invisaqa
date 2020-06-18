<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * このユーザが所有する投稿
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * このユーザが所有する回答
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * ユーザが参考になったを押したアンサーを取得
     */
    public function likes()
    {
        return $this->belongsToMany(Answer::class, 'likes', 'user_id', 'answer_id')->withTimestamps();
    }

    
    /**
    * 回答を参考になったする
    */
    public function like($answerId)
    {
        // すでに参考になったしているかの確認
        $exist = $this->is_like($answerId);
        if ($exist) {
            return false;
        } else {
            $this->likes()->attach($answerId);
            return true;
        }
    }

    
    /**
    * 回答を参考になったする
    */
    public function unlike($answerId)
    {
        // すでに参考になったしているかの確認
        $exist = $this->is_like($answerId);
        if ($exist) {
            $this->likes()->attach($answerId);
            return true;
        } else {
            return false;
        }
    }


    /**
     * 指定された $userIdのユーザをこのユーザがフォロー中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_like($answerId)
    {
        return $this->likes()->where('answer_id', $answerId)->exists();
    }



}
