<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Genre;
use Log;
use App\Utils\CommonUtil;
use App\GenreItem;

class ItemController extends Controller
{

  /**
   * 商品表示アクション
   */
  public function index(Request $request)
  {
    $actressModel = app()->make('App\Actress');
    $itemModel = app()->make('App\Item');
    $genreItemModel = app()->make('App\GenreItem');

    $test = Item::whereHas('actresses', function($query) {
      $query->whereIn('id', [15365, 1030262]);
    })->whereIn('id', ['53dv01475', 'onsd00879'])->get();
    // $test = $genreItemModel->findByGenreIds([2001, 5002, 5001]);
    // dd($test);
    

    // 商品全件カウント
    $itemCnt = $itemModel->countAllItem();

    if (empty($request->input('page_id'))) {
      $pageId = 1;
    } else {
      $pageId = $request->input('page_id');
      $items = $itemModel->findItems($pageId, \DmmConst::MAX);
      return response()->json(['items' => $items]);
    }

    $actressName = $request->input('actress_name');
    $genreIds = $request->input('genre_ids');
    if (isset($actressName) || isset($genreIds)) {
      $items = $itemModel->findItems($pageId, \DmmConst::MAX, $genreIds, $genreItemModel, $actressName, $actressModel);
      $itemCnt = $itemModel->countItem($genreIds, $genreItemModel, $actressName, $actressModel);
      $maxPage = CommonUtil::getMaxPage($itemCnt);
      return response()->json(['items' => $items, 'max_page' => $maxPage]);
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
