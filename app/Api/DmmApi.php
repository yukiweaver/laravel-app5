<?php

namespace App\Api;

use App\Consts\DmmConst;
use Log;

class DmmApi
{

  // 取得件数（最大100）
  private $hits;

  // 検索開始位置
  private $offset;

  // 女優ID
  private $actressId;

  // 検索キーワード
  private $keyword;

  // ソート順
  private $sort;

  // 頭文字（50音）
  private $initial;

  public function __construct($hits='', $offset='', $actressId='', $keyword='', $sort='', $initial='')
  {
    $this->hits       = $hits;
    $this->offset     = $offset;
    $this->actressId  = $actressId;
    $this->keyword    = $keyword;
    $this->sort       = $sort;
    $this->initial    = $initial;
  }

  public function apiActressSearch()
  {
    $request = new \HTTP_Request2(DmmConst::ENDPOINT . 'ActressSearch');
    $url = $request->getUrl();

    $headers = array(
        // Request headers
        // 'Ocp-Apim-Subscription-Key' => FaceApi::KEY,
    );

    $request->setHeader($headers);

    $parameters = array(
        // Request parameters
        'api_id'        => DmmConst::API_ID,
        'affiliate_id'  => DmmConst::AFFILIATE_ID,
        'keyword'       => $this->keyword,
        'hits'          => $this->hits,
        'offset'        => $this->offset,
        'actress_id'    => $this->actressId,
        'sort'          => $this->sort,
        'initial'       => $this->initial,
        'output'        => 'json',
    );

    $url->setQueryVariables($parameters);

    $request->setMethod(\HTTP_Request2::METHOD_GET);

    try
    {
        $response = $request->send();
        $actressInfo = $response->getBody();
        $actresses = json_decode($actressInfo, true);
        return $actresses['result'];
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }
  }
}