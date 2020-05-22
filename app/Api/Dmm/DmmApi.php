<?php

namespace App\Api\Dmm;

use App\Consts\DmmConst;
use Illuminate\Support\Facades\Log;

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
    Log::info('apiActressSearch start!');

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

    $client = new \GuzzleHttp\Client();
    $path = DmmConst::ENDPOINT . 'ActressSearch';

    try
    {
        $response = $client->get($path, [
          'query' => $parameters
        ]);
        $actressInfo = $response->getBody();
        $actresses = json_decode($actressInfo, true);
        // ステータスコード確認
        if ($actresses['result']['status'] != 200) {
          Log::error('status:' . $actresses['result']['status']);
          Log::error('message:' . $actresses['result']['message']);
          $errors = $actresses['result']['errors'];
          foreach ($errors as $key => $error) {
            Log::error($key . ':' . $error);
          }
          return [
            'status'    => $actresses['result']['status'],
            'message'   => $actresses['result']['message'],
            'errors'    => $actresses['result']['errors'],
          ];
        }
        Log::info('apiActressSearch success!');
        return $actresses['result'];
    }
    catch (\Exception $ex)
    {
        echo $ex;
    }
  }

  /**
   * 商品検索API実行
   * @return array
   */
  public function apiItemsSearch()
  {
    Log::info('apiItemSearch start');

    $parameters = array(
        // Request parameters
        'api_id'        => DmmConst::API_ID,
        'affiliate_id'  => DmmConst::AFFILIATE_ID,
        'site'          => DmmConst::SITE,
        'keyword'       => $this->dmmProperty->getKeyword(),
        'hits'          => $this->dmmProperty->getHits(),
        'offset'        => $this->dmmProperty->getOffset(),
        'actress_id'    => $this->dmmProperty->getActressId(),
        'sort'          => $this->dmmProperty->getSort(),
        'floor'         => 'videoa',
        'service'       => 'digital',
        'initial'       => $this->dmmProperty->getInitial(),
        'output'        => 'json',
    );

    $client = new \GuzzleHttp\Client();
    $path = DmmConst::ENDPOINT . 'ItemList';

    try
    {
        $response = $client->get($path, [
          'query' => $parameters
        ]);
        $itemInfo = $response->getBody();
        $items = json_decode($itemInfo, true);

        // ステータスコード確認
        if ($items['result']['status'] != 200) {
          Log::error('status:' . $items['result']['status']);
          Log::error('message:' . $items['result']['message']);
          $errors = $items['result']['errors'];
          foreach ($errors as $key => $error) {
            Log::error($key . ':' . $error);
          }
          return [
            'status'    => $items['result']['status'],
            'message'   => $items['result']['message'],
            'errors'    => $items['result']['errors'],
          ];
        }
        Log::info('apiItemSearch success!');
        return $items['result'];
    }
    catch (\Exception $ex)
    {
        echo $ex;
    }
  }

  /**
   * ジャンル検索API実行
   * @return array
   */
  public function apiGenresSearch()
  {
    Log::info('genreSearchApi start!');

    $parameters = array(
        // Request parameters
        'api_id'        => DmmConst::API_ID,
        'affiliate_id'  => DmmConst::AFFILIATE_ID,
        'floor_id'      => DmmConst::FLOOR_ID,
        'hits'          => '500',
        'offset'        => $this->dmmProperty->getOffset(),
        'initial'       => $this->dmmProperty->getInitial(),
        'output'        => 'json',
    );

    $client = new \GuzzleHttp\Client();
    $path = DmmConst::ENDPOINT . 'GenreSearch';

    try
    {
        $response = $client->get($path, [
          'query' => $parameters
        ]);
        $genreInfo = $response->getBody();
        $genres = json_decode($genreInfo, true);

        // ステータスコード確認
        if ($genres['result']['status'] != 200) {
          Log::error('status:' . $genres['result']['status']);
          Log::error('message:' . $genres['result']['message']);
          $errors = $genres['result']['errors'];
          foreach ($errors as $key => $error) {
            Log::error($key . ':' . $error);
          }
          return [
            'status'    => $genres['result']['status'],
            'message'   => $genres['result']['message'],
            'errors'    => $genres['result']['errors'],
          ];
        }
        Log::info('genreSearchApi success!');
        return $genres['result'];
    }
    catch (\Exception $ex)
    {
        echo $ex;
    }
  }
}