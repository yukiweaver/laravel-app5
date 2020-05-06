<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Genre;
use Log;
use App\Utils\CommonUtil;

class ItemController extends Controller
{

  /**
   * 商品表示アクション
   */
  public function index(Request $request)
  {
    $actressModel = app()->make('App\Actress');
    $itemModel = app()->make('App\Item');

    // 商品全件カウント
    $itemCnt = $itemModel->countItem();

    if (empty($request->input('page_id'))) {
      $pageId = 1;
    } else {
      $pageId = $request->input('page_id');
      $items = $itemModel->findItems($pageId, \DmmConst::MAX);
      return response()->json(['items' => $items]);
    }

    $actressName = $request->input('actress_name');
    $ids = $actressModel->getIdsByName($actressName);
    // dd($ids);
    $genreIds = $request->input('genre_ids');
    if (isset($actressName) || isset($genreIds)) {
      $items = $itemModel->findItem($pageId, \DmmConst::MAX, $actressName, $genreIds, $actressModel);
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
      'genres' => collect(\DmmConst::GENRE_LIST),
    ];

    return view('item.index', $viewParams);
  }

  public function detail(Request $request)
  {
    //
  }
}
