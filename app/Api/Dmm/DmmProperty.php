<?php

namespace App\Api\Dmm;

use Exception;

class DmmProperty
{
  // 取得件数（最大100）
  private $hits;

  // 検索開始位置
  private $offset;

  // 女優ID
  private $actressId;

  // 検索キーワード
  private $keyword;

  // ソート順
  private $sort;

  // 頭文字（50音）
  private $initial;

  public function __construct($hits='', $offset='', $actressId='', $keyword='', $sort='', $initial='')
  {
    if ($hits > 100) {
      throw new Exception('hitsの値が不正です。');
    }
    $this->hits       = $hits;
    $this->offset     = $offset;
    $this->actressId  = $actressId;
    $this->keyword    = $keyword;
    $this->sort       = $sort;
    $this->initial    = $initial;
  }

  public function getHits()
  {
    return $this->hits;
  }

  public function getOffset()
  {
    return $this->offset;
  }

  public function getActressId()
  {
    return $this->actressId;
  }

  public function getKeyword()
  {
    return $this->keyword;
  }

  public function getSort()
  {
    return $this->sort;
  }

  public function getInitial()
  {
    return $this->initial;
  }
}