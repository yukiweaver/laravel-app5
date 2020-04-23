<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
use Log;

class Actress extends Model
{
  // プライマリーキーは自動連番なしに設定
  public $incrementing = false;

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

  /**
   * 一括登録
   * 
   * @param array
   * @return boolean
   */
  public function bulkInsert($params)
  {
    try {
      $isResult = DB::table('actresses')->insert($params);
      if (!$isResult) {
        throw new Exception('一括登録に失敗しました。');
      }
      DB::commit();
    } catch (Exception $e) {
      DB::rollback();
      Log::error($e->getMessage());
      echo $e->getMessage();
    }
  }
}
