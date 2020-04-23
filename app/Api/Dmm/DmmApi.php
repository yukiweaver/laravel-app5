<?php

namespace App\Api\Dmm;

use App\Consts\DmmConst;
use Log;

class DmmApi
{
  /**
   * @var DmmProperty
   */
  private $dmmProperty;


  public function __construct(DmmProperty $dmmProperty)
  {
    $this->dmmProperty = $dmmProperty;
  }

  /**
   * 女優検索API実行
   * @return array
   */
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
        'keyword'       => $this->dmmProperty->getKeyword(),
        'hits'          => $this->dmmProperty->getHits(),
        'offset'        => $this->dmmProperty->getOffset(),
        'actress_id'    => $this->dmmProperty->getActressId(),
        'sort'          => $this->dmmProperty->getSort(),
        'initial'       => $this->dmmProperty->getInitial(),
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

  /**
   * 商品検索API実行
   */
  public function apiItemSearch()
  {
    // 共通箇所はまとめたい
  }
}