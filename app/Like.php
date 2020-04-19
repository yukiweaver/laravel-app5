<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  /**
   * このお気に入りを所有するactressを取得
   */
  public function actress()
  {
    return $this->belongsTo('App\Actress');
  }

  /**
   * このお気に入りを所有するuserを取得
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'actress_id',
  ];
}
