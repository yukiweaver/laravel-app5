@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div id="form">
        <p class="form-title">新規登録</p>
        @if (count($errors) > 0)
        <div class="errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ route('user.store') }}" method="POST">
          @csrf
          <p>名前</p>
          <p class="name"><input type="text" name="name" value="{{old('name')}}"></p>
          <p>メールアドレス</p>
          <p class="mail"><input type="email" name="email" value="{{old('email')}}" /></p>
          <p>パスワード</p>
          <p class="pass"><input type="password" name="password" value="{{old('password')}}" /></p>
          <p>パスワード確認</p>
          <p class="pass-confirm"><input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"></p>
          <p class="submit"><input type="submit" value="新規登録" /></p>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection