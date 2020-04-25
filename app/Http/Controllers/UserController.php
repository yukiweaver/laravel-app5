<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\Dmm\DmmApi;
use App\Api\Dmm\DmmProperty;
use App\Consts\DmmConst;

class UserController extends Controller
{
  public function signin()
  {
    $propertyInfo = DmmConst::PROPERTY_INFO;
    $propertyInfo['keyword'] = 'あやみ旬果';
    $dmmApi = app()->makeWith('DmmApi', $propertyInfo);
    // dd($dmmApi);
    $list = $dmmApi->apiItemsSearch();
    dd($list);
    // foreach ($list['items'] as $val) {
    //   dd($val['sampleImageURL']);
    // }
    return view('user.signin');
  }
}
