<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{

  // プライマリーキーは自動連番なしに設定
  public $incrementing = false;

  /**
   * ジャンルが所有するitemを取得
   */
  public function items()
  {
    return $this->belongsToMany('App\Item')
                ->using('App\GenreItem');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'name',
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
      $isResult = DB::table('genres')->insert($params);
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
