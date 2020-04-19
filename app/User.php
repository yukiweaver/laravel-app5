<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * ユーザが所有するlikeを取得
     */
    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    /**
     * ユーザが所有するpostを取得
     */
    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    /**
     * ユーザが所有するreplyを取得
     */
    public function replies()
    {
      return $this->hasMany('App\Reply');
    }

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
}
