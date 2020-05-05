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
}