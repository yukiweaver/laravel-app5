<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  /**
   * この返信を所有するuserを取得
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * この返信を所有するpostを取得
   */
  public function post()
  {
    return $this->belongsTo('App\Post');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'post_id',
    'r_content',
  ];
}
