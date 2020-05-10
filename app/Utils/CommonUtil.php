<?php

namespace App\Utils;

class CommonUtil
{

  public static function pagenateInfo($itemCnt, $pageId)
  {
    // 最大ページ数
    $maxPage = ceil($itemCnt / \DmmConst::MAX);

    // 前リンク判定 trueで遷移不可
    if ($pageId <= 1) {
      $prevFlg = true;
    } else {
      $prevFlg = false;
    }

    // 次リンク判定 trueで遷移不可
    if ($pageId >= $maxPage) {
      $nextFlg = true;
    } else {
      $nextFlg = false;
    }

    return [
      'max_page' => $maxPage,
      'prev_flg' => $prevFlg,
      'next_flg' => $nextFlg,
    ];
  }

  /**
   * 最大ページ数を返す
   */
  public static function getMaxPage($itemCnt)
  {
    if ($itemCnt === 0) {
      return 1;
    } 
    
    $maxPage = ceil($itemCnt / \DmmConst::MAX);
    return $maxPage;
  }

  /**
   * $strが全て平仮名ならtrue,それ以外はfalseを返す
   * @return boolean
   */
  public static function strCheck($str)
  {
    mb_regex_encoding("UTF-8");
    if (preg_match("/^[ぁ-ん]+$/u", $str)) {
        return true;
    }
    return false;
  }
}