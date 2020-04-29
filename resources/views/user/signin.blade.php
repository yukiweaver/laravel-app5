@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (count($errors) > 0)
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div id="form">
        <p class="form-title">ログイン</p>
        <form action="{{ route('user.login') }}" method="POST">
          @csrf
          <p>メールアドレス</p>
          <p class="mail"><input type="email" name="email" value="{{old('email')}}" /></p>
          <p>パスワード</p>
          <p class="pass"><input type="password" name="password" value="{{old('password')}}" /></p>
          <p class="regist"><a href="#">新規登録</a></p>
          <p class="submit"><input type="submit" value="ログイン" /></p>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection