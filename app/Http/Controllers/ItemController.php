<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Genre;
use Log;
use App\Utils\CommonUtil;
use App\GenreItem;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{

  /**
   * 商品表示アクション
   */
  public function index(ItemRequest $request)
  {
    $actressModel   = app()->make('App\Actress');
    $itemModel      = app()->make('App\Item');
    $genreItemModel = app()->make('App\GenreItem');

    // 商品全件カウント
    $itemCnt = $itemModel->countAllItem();

    if (empty($request->input('page_id'))) {
      $pageId = 1;
    } else {
      $pageId = $request->input('page_id');
      $actressName = $request->session()->get('actress_name');
      $genreIds = $request->session()->get('genre_ids');
      $items = $itemModel->findItems($pageId, \DmmConst::MAX, $genreIds, $genreItemModel, $actressName, $actressModel);
      $itemCnt = $itemModel->countItem($genreIds, $genreItemModel, $actressName, $actressModel);
      $maxPage = CommonUtil::getMaxPage($itemCnt);
      return response()->json(['items' => $items, 'max_page' => $maxPage]);
    }

    $actressName = $request->input('actress_name');
    $genreIds = $request->input('genre_ids');
    if (isset($actressName) || isset($genreIds)) {
      $request->session()->put('actress_name', $actressName);
      $request->session()->put('genre_ids', $genreIds);
      $items = $itemModel->findItems($pageId, \DmmConst::MAX, $genreIds, $genreItemModel, $actressName, $actressModel);
      $itemCnt = $itemModel->countItem($genreIds, $genreItemModel, $actressName, $actressModel);
      $maxPage = CommonUtil::getMaxPage($itemCnt);
      if ($request->ajax()) {
        return response()->json(['items' => $items, 'max_page' => $maxPage]);
      }
    }

    $pagenateInfo = CommonUtil::pagenateInfo($itemCnt, $pageId);

    $items = $itemModel->findItems($pageId, \DmmConst::MAX, $genreIds, $genreItemModel, $actressName, $actressModel);
    $viewParams = [
      'items'     => $items,
      'prev_flg'  => $pagenateInfo['prev_flg'],
      'next_flg'  => $pagenateInfo['next_flg'],
      'page_id'   => $pageId,
      'max_page'  => $pagenateInfo['max_page'],
      'genres'    => collect(\DmmConst::GENRE_LIST),
    ];
    if (!CommonUtil::checkPreviousUrl()) {
      $request->session()->forget('actress_name');
      $request->session()->forget('genre_ids');
    }
    return view('item.index', $viewParams);
  }

  /**
   * 商品詳細ページ表示アクション
   */
  public function detail(ItemRequest $request)
  {
    $itemId = $request->input('item_id');
    $item = Item::find($itemId);

    $viewParams = [
      'item' => $item,
    ];
    return view('item.detail', $viewParams);
  }
}
