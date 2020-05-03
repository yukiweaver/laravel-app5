@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      @if (count($errors) > 0)
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div id="mainBox">
        <h1>商品ページ</h1>
        <div id="parent">
          @foreach ($items as $item)
          <div class="child">
            <div class="img">
              <img src="{{$item->s_image_url}}" width="147" height="200">
            </div>
            <p class="title">{{$item->title}}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection