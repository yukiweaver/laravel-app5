<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
use Log;

class Item extends Model
{
  // プライマリーキーは自動連番なしに設定
  public $incrementing = false;

  // プライマリーキーの型
  protected $keyType = 'string';

  
  /**
   * 商品に所属するactressを取得
   */
  public function actresses()
  {
    return $this->belongsToMany('App\Actress');
  }

  /**
   * 商品に所属するgenreを取得
   */
  public function genres()
  {
    return $this->belongsToMany('App\Genre');
  }

  /**
   * 商品が所有するpostを取得
   */
  public function posts()
  {
    return $this->hasMany('App\Post');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'title',
    'item_url',
    'affiliate_url',
    's_image_url',
    'l_image_url',
    'sample_image_url_1',
    'sample_image_url_2',
    'sample_image_url_3',
    'sample_image_url_4',
    'sample_image_url_5',
    'price',
    'release_date',
    'series_name',
    'marker_name',
    'director_name',
    'label_name',
    'volume',
  ];

  /**
   * 一括登録
   * 
   * @param array
   * @return boolean
   */
  public function bulkInsert($params)
  {
    try {
      $isResult = DB::table('items')->insert($params);
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