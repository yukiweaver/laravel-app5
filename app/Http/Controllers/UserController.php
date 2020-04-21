<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\DmmApi;

class UserController extends Controller
{
  public function signin()
  {
    $dmmApi = new DmmApi('10', '', '', '成瀬心美', 'id');
    $list = $dmmApi->apiActressSearch();
    dd($list);
    return view('user.signin');
  }
}
