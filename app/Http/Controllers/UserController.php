<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\Dmm\DmmApi;
use App\Api\Dmm\DmmProperty;
use App\Consts\DmmConst;
use App\Item;
use Auth;
use App\Http\Requests\UserRequest;
use Hash;

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
  public function login(UserRequest $request)
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

  /**
   * ユーザ登録ページ表示アクション
   */
  public function create()
  {
    return view('user.create');
  }

  /**
   * ユーザ登録処理アクション
   */
  public function store(UserRequest $request)
  {
    $user       = app()->make('App\User');
    $name       = $request->input('name');
    $email      = $request->input('email');
    $password   = $request->input('password');
    $params     = [
      'name'      => $name,
      'email'     => $email,
      'password'  => Hash::make($password),
    ];

    if (!$user->fill($params)->save()) {
      return redirect()->route('user.create')->with('error_message', 'ユーザ登録に失敗しました。');
    }

    if (!Auth::attempt(['email' => $email, 'password' => $password])) {
      return redirect()->route('user.signin')->with('error_message', 'ログインに失敗しました。');
    }
    return redirect()->route('item.index');
  }
}
