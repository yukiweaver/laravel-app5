<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Log;
use App\Utils\CommonUtil;

class ItemController extends Controller
{

  /**
   * 商品表示アクション
   */
  public function index(Request $request)
  {
    $itemModel = app()->make('App\Item');

    // 商品全件カウント
    $itemCnt = Item::count();

    if (empty($request->input('page_id'))) {
      $pageId = 1;
    } else {
      $pageId = $request->input('page_id');
      $items = $itemModel->findItems($pageId, \DmmConst::MAX);
      return response()->json(['items' => $items]);
    }

    $pagenateInfo = CommonUtil::pagenateInfo($itemCnt, $pageId);

    $items = $itemModel->findItems($pageId, \DmmConst::MAX);
    $viewParams = [
      'items' => $items,
      'prev_flg' => $pagenateInfo['prev_flg'],
      'next_flg' => $pagenateInfo['next_flg'],
      'page_id' => $pageId,
      'max_page' => $pagenateInfo['max_page'],
    ];

    return view('item.index', $viewParams);
  }

  public function detail(Request $request)
  {
    //
  }
}
