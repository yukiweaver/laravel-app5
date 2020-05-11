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
        <div class="search_link_genre">
          <form>
            <div class="form-group">
                <label for="actress_name">女優名（ひらがな、漢字）</label><br>
                <input type="text" name="actress_name" class="form-control" value="" id="actress_name">
            </div>
            <div class="form-group" id="genres">
              <label>ジャンル</label><br>
              @foreach ($genres as $genre)
              <div class="genre_name">
                <input type="checkbox" id="{{$genre['id']}}" name="genres" value="{{$genre['id']}}">
                <label for="{{$genre['id']}}">{{$genre['name']}}</label>
              </div>
              @endforeach
            </div>
            <button type="button" class="btn btn-primary" id="search_btn">検索する</button>
          </form>
        </div>
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
        <li class="pre"><a><span id="prev"><<<</span></a></li>
        @else
        <li class="pre"><a href="#"><span id="prev"><<<</span></a></li>
        @endif
        @if ($next_flg)
        <li class="next"><a><span id="next">>>></span></a></li>
        @else
        <li class="next"><a href="#"><span id="next">>>></span></a></li>
        @endif
      </ul>
    </div>
  </div>
</div>
<script>
  $(function() {
    // ページネーション
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
        if (data.items.length == 0) {
          alert('商品を取得できませんでした。');
          return;
        }
        let prevFlg = (pageId <= 1 && targetId == 'prev') ? true : false;
        let nextFlg = (pageId >= data.max_page && targetId == 'next') ? true : false;
        $('.child').remove();
        $.each(data.items, function(ids, item) {
          $('#parent').append(createHtmlItems(item));
        });
        $('.pagination').html(createHtmlPagenate(pageId, prevFlg, nextFlg));
      })
      .fail((data) => {
        alert('error:ajax通信失敗');
      })
    });

    // 検索
    $('#search_btn').click(function() {
      let actressName = $('#actress_name').val();
      let genreIds = $('input[name=genres]:checked').map(function() {
        return $(this).val();
      }).get();
      if (!actressName && genreIds.length == 0) {
        alert('女優名を入力またはジャンルを選択してください。');
        return false;
      }

      $.ajax({
        url: "{{route('item.index')}}",
        type: "GET",
        dataType: "json",
        data: {
          'actress_name': actressName,
          'genre_ids': genreIds,
        }
      })
      .done((data) => {
        if (data.items.length == 0) {
          alert('該当商品が存在しません。');
          $('input[name=genres]').prop('checked', false);
          $('#actress_name').val('');
          return;
        }
        let pageId = 1;
        let prevFlg = true;
        let nextFlg = data.max_page <= 1 ? true : false;
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
      html += `<li class="pre"><a><span id="prev"><<<</span></a></li>`;
    } else {
      html += `<li class="pre"><a href="#"><span id="prev"><<<</span></a></li>`;
    }
    if (nextFlg) {
      html += `<li class="next"><a><span id="next">>>></span></a></li>`;
    } else {
      html += `<li class="next"><a href="#"><span id="next">>>></span></a></li>`;
    }
    return html;
  }
</script>
@endsection