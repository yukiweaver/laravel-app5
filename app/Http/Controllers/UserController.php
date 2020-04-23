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
    $propertyInfo['keyword'] = '成瀬';
    $dmmApi = app()->makeWith('DmmApi', $propertyInfo);
    // dd($dmmApi);
    $list = $dmmApi->apiActressSearch();
    dd($list);
    return view('user.signin');
  }
}
