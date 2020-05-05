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
            <p class="title"><a href="{{route('item.detail', ['item_id' => $item->id])}}">{{$item->title}}</a></p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="pager">
      <ul class="pagination">
        <input type="hidden" id="page_id" value="{{$page_id}}">
        @if ($prev_flg)
        <li class="pre"><a><span id="prev">前へ</span></a></li>
        @else
        <li class="pre"><a href="#"><span id="prev">前へ</span></a></li>
        @endif
        @if ($next_flg)
        <li class="next"><a><span id="next">次へ</span></a></li>
        @else
        <li class="next"><a href="#"><span id="next">次へ</span></a></li>
        @endif
      </ul>
    </div>
  </div>
</div>
<script>
  $(function() {
    $('.pagination').click(function(event) {
      event.preventDefault();
      let currentPageId = $('#page_id').val();
      let targetId = event.target.id;
      let pageId = (targetId == 'prev') ? parseInt(currentPageId, 10) -1 : parseInt(currentPageId, 10) + 1;
      if (currentPageId <= 1 && targetId == 'prev') {
        return false;
      }
      if (currentPageId >= '{{$max_page}}' && targetId == 'next') {
        return false;
      }
      $.ajax({
        url: "{{route('item.index')}}",
        type: "GET",
        dataType: "json",
        data: {
          'page_id': pageId,
        }
      })
      .done((data) => {
        if (data.length == 0) {
          alert('error:商品を取得できませんでした。');
          return;
        }
        let prevFlg = (pageId <= 1 && targetId == 'prev') ? true : false;
        let nextFlg = (pageId >= '{{$max_page}}' && targetId == 'next') ? true : false;
        $('.child').remove();
        $.each(data.items, function(ids, item) {
          $('#parent').append(createHtmlItems(item));
        });
        $('.pagination').html(createHtmlPagenate(pageId, prevFlg, nextFlg));
      })
      .fail((data) => {
        alert('error:ajax通信失敗');
      })
    })
  })

  function createHtmlItems(item)
  {
    let url = "{{url('/')}}" + '/item/detail?item_id=' + item.id;
    let html = '';
    html += `<div class="child">`;
    html += `<div class="img">`;
    html += `<img src="${item.s_image_url}" width="147" height="200">`;
    html += `</div>`;
    html += `<p class="title"><a href=${url}>${item.title}</a></p>`;
    html += `</div>`;
    return html;
  }

  function createHtmlPagenate(pageId, prevFlg, nextFlg)
  {
    let html = '';
    html += `<input type="hidden" id="page_id" value="${pageId}">`;
    if (prevFlg) {
      html += `<li class="pre"><a><span id="prev">前へ</span></a></li>`;
    } else {
      html += `<li class="pre"><a href="#"><span id="prev">前へ</span></a></li>`;
    }
    if (nextFlg) {
      html += `<li class="next"><a><span id="next">次へ</span></a></li>`;
    } else {
      html += `<li class="next"><a href="#"><span id="next">次へ</span></a></li>`;
    }
    return html;
  }
</script>
@endsection