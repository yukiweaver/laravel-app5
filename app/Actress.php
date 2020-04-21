<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actress extends Model
{
  /**
   * 女優が所有するlikeを取得
   */
  public function likes()
  {
    return $this->hasMany('App\Like');
  }

  /**
   * 女優が所有するitemを取得
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
    'id',
    'name',
    'name_kana',
    'bust',
    'cup',
    'waist',
    'hip',
    'height',
    'birthday',
    'blood_type',
    'hoby',
    'prefectures',
    'image_url',
  ];

  /**
   * 女優名で前方一致検索
   */
  public function searchByName($name)
  {
    $actresses = $this->where('name', 'LIKE', "$name%")->get();
    return $actresses;
  }
}
