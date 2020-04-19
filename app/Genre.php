<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  /**
   * ジャンルが所有するitemを取得
   */
  public function items()
  {
    return $this->belongsToMany('App\Item');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
  ];
}
