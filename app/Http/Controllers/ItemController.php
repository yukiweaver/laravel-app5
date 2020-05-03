<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
  /**
   * 商品表示アクション
   */
  public function index()
  {
    $itemAll = Item::orderBy('id', 'desc')->take(30)->get();
    $viewParams = [
      'items' => $itemAll,
    ];
    return view('item.index', $viewParams);
  }
}
