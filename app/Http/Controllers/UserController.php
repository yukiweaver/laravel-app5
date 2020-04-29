<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\Dmm\DmmApi;
use App\Api\Dmm\DmmProperty;
use App\Consts\DmmConst;
use App\Item;
use Auth;

class UserController extends Controller
{
  /**
   * ログインページ表示アクション
   */
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

  /**
   * ログイン処理アクション
   */
  public function login(Request $request)
  {
    $email    = $request->input('email');
    $password = $request->input('password');
    if (!Auth::attempt(['email' => $email, 'password' => $password])) {
      // 認証失敗
      return redirect('/')->with('error_message', 'ログインに失敗しました。');
    }
    // 認証成功
    return redirect()->route('item.index');
  }

  /**
   * ログアウト処理アクション
   */
  public function logout()
  {
    Auth::logout();
    return redirect()->route('user.signin');
  }
}
