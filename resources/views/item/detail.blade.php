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
      <div class="page-detail">
        <div class="area-headline group">
          <div class="hreview">
            <span class="red"></span><h1 id="title" class="item fn">{{$item->title}}</h1>
          </div>
        </div>
        <table border="0" width="100%" cellspacing="0" cellpadding="0" class="mg-b12">
          <tr>
            <td valign="top">
              <div class="float-l mg-b20 mg-r12">
                <div class="detail">
                <div class="center" id="sample-video">
                  <a href="{{$item->s_image_url}}" target="_package" name="package-image" id="mide00770">
                    <img src="{{$item->s_image_url}}" alt="{{$item->title}}" id="package-src-mide00770" class="tdmm">
                  </a>
                  <div class="tx10 pd-3">
                    <a href="{{$item->l_image_url}}" name="package-image" target="_package" id="mide00770">イメージを拡大</a>
                  </div>
                </div>
                <table border="0" cellpadding="2" cellspacing="0" class="mg-b20">

                  <tr>
                    <td align="right" valign="top" class="nw">商品発売日：</td>
                    <td>{{$item->release_date}}</td>
                  </tr>

                  <tr>
                    <td align="right" valign="top" class="nw">収録時間：</td>
                    <td>{{$item->volume}}</td>
                  </tr>
        
                  <tr>
                    <td align="right" valign="top" class="nw">出演者：</td>
                    <td>
                      @foreach ($item->actresses as $actress)
                      <a href="{{route('item.index', ['actress_name' => $actress->name])}}">{{$actress->name}}</a>
                      @endforeach
                    </td>
                  </tr>
        
                  <tr>
                    <td align="right" valign="top" class="nw">監督：</td>
                    <td>{{$item->director_name}}</td>
                  </tr>
        
                  <tr>
                    <td align="right" valign="top" class="nw">シリーズ：</td>
                    <td>{{$item->series_name}}</td>
                  </tr>
        
                  <tr>
                    <td align="right" valign="top" class="nw">メーカー：</td>
                    <td>{{$item->maker_name}}</td>
                  </tr>

                  <tr>
                    <td align="right" valign="top" class="nw">レーベル：</td>
                    <td>{{$item->label_name}}</td>
                  </tr>

                  <tr>
                    <td align="right" valign="top" class="nw">ジャンル：</td>
                    <td>
                      @foreach ($item->genres as $genre)
                      <a href="{{route('item.index', ['genre_ids' => [$genre->id]])}}">{{$genre->name}}</a>&nbsp;&nbsp;
                      @endforeach
                    </td>
                  </tr>

                  <tr>
                    <td align="right" valign="top" class="nw">料金：</td>
                    <td>{{$item->price}}</td>
                  </tr>

                  <tr>
                    <td align="right" valign="top" class="nw">平均評価：</td>
                    <td><img src="https://p.dmm.co.jp/p/ms/review/4.gif" width="56" height="11" class="mg-r6 middle">
                      <a href="#review">レビューを見る</a>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"></td>
                  </tr>
                </table>
                </div>

                {{-- <div class="clear"></div>
                <div class="mg-b20 lh4">
                  18歳…それは思っている以上にスベスベで張りがある綺麗な肌。髪はサラサラで瞳はエネルギーに満ちている。カラダは未完成の性感帯が沢山隠れていて、こんなに可愛いのに自信がない女の子。’恥じらい’と’決意’に溢れたピュア美少女のAVデビュー作品。【小野六花（おのりっか）MOODYZ新人デビュー】。<p class="mg-t6 tx10">※ 配信方法によって収録内容が異なる場合があります。</p>
                </div> --}}

                <div id="sample-image-block" class="d-zoomimg-sm">
                  <a name="sample-image" id="sample-image1"><img src="{{$item->sample_image_url_1}}" border="0" alt="" class="mg-b6"></a>
                  <a name="sample-image" id="sample-image2"><img src="{{$item->sample_image_url_2}}" border="0" alt="" class="mg-b6"></a>
                  <a name="sample-image" id="sample-image3"><img src="{{$item->sample_image_url_3}}" border="0" alt="" class="mg-b6"></a>
                  <a name="sample-image" id="sample-image4"><img src="{{$item->sample_image_url_4}}" border="0" alt="" class="mg-b6"></a>
                  <a name="sample-image" id="sample-image5"><img src="{{$item->sample_image_url_5}}" border="0" alt="" class="mg-b6"></a>
                  <br>
                  <div class="tx10">画像はイメージです。実際の商品画像とは異なる場合がございます。<br></div>
                </div>
                <noscript>
                  <div class="mg-b6">
                    <span class="red">拡大サンプル画像をご覧いただくにはJavaScriptを有効にしてください</span><br>
                    <a href="/help/faq_16_html/=/ch_navi=none#Q3" target="_blank" class="arrow">JavaScriptの設定方法</a>
                  </div>
                </noscript>

                <div class="wp-smplex">
                  <div class="cont-smplex" id="viewer" style="display:none;">
                    <div>
                      <p class="pic-capt">
                        <a id="close" class="float-r">
                          <img src="https://p.dmm.co.jp/p/title/ico_close.gif" width="11" height="11" alt="閉じる">
                        </a>
                        <span id="preview-title"></span>
                      </p>
                      <a id="preview-middle"><img id="preview-image" src="https://p.dmm.co.jp/p/title/loading.gif" alt="読込み中" class="sample-pic"></a>
                      <p id="preview-comment" class="tx10" style="display:none">画像はイメージです。実際の内容と異なる場合があります。</p>
                      <span id="preview-block">
                        <div class="bt-smplex" id="viewer-move" style="display:block;">
                          <ul>
                            <li class="left"><a id="back_num" class="bold">前へ</a>&nbsp;</li>
                            <li class="center"><span id="now_num">1</span>/<span id="max_num">10</span></li>
                            <li class="right">&nbsp;<a id="next_num" class="bold">次へ</a></li>
                          </ul>
                        </div>
                        <p id="preview-copyright"></p>
                        <p><a href="#" id="close2">拡大イメージを閉じる</a></p>
                      </span>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection