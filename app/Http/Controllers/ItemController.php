<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
  /**
   * 商品表示アクション
   */
  public function index()
  {
    return view('item.index');
  }
}
