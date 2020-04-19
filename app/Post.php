<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /**
   * この投稿を所有するitemを取得
   */
  public function item()
  {
    return $this->belongsTo('App\Item');
  }

  /**
   * この投稿を所有するuserを取得
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * 投稿が所有するreplyを取得
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
    'user_id',
    'item_id',
    'p_content',
  ];
}
