<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\Dmm\DmmApi;
use App\Api\Dmm\DmmProperty;
use App\Consts\DmmConst;
use App\Item;

class UserController extends Controller
{
  public function signin()
  {
    // $propertyInfo = DmmConst::PROPERTY_INFO;
    // $propertyInfo['keyword'] = 'あやみ旬果';
    // $dmmApi = app()->makeWith('DmmApi', $propertyInfo);
    // $list = $dmmApi->apiItemsSearch();
    // dd($list);
    // $genresList = $dmmApi->apiGenresSearch();
    // dd($genresList);
    // $item = Item::find('xvsr00237');
    // dd($item);
    return view('user.signin');
  }
}
