<?php

use Illuminate\Database\Seeder;
use App\Consts\DmmConst;
use App\Actress;
use App\Item;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * itemsテーブルとactress_itemテーブルの登録
     *
     * @return void
     */
    public function run()
    {
      Log::info('ItemsTableSeeder start!');
      Eloquent::unguard();
      $itemModel = app()->make('App\Item');
      $propertyInfo = DmmConst::PROPERTY_INFO;
      $actressAll = Actress::all();
      if ($actressAll->isEmpty()) {
        Log::error('女優データが空です。');
        dd('エラー発生。ログを確認してください。');
      }
      foreach ($actressAll as $actress) {
        $propertyInfo['keyword'] = $actress['name'];
        $dmmApi = app()->makeWith('DmmApi', $propertyInfo);
        $apiResult = $dmmApi->apiItemsSearch();

        if ($apiResult['status'] !== 200) {
          dd('API実行中にエラー発生。ログを確認してください。');
        }

        // API実行結果が0件ならスキップ
        if ($apiResult['total_count'] == 0) {
          continue;
        }

        $items = $apiResult['items'];
        $itemIds = [];
        $i = 0;
        $itemInfo = [];
        foreach ($items as $value) {
          $item = Item::find($value['content_id']);

          // DBに登録済みならスキップ
          if (!empty($item)) {
            continue;
          }

          // APIで取得する商品にはidが同じものがあるのでチェック
          if (in_array($value['content_id'], $itemIds, true)) {
            continue;
          }

          // 女優一人につき20商品まで
          if ($i >= 20) {
            break;
          }

          $itemInfo[] = [
            'id'                  => $value['content_id'] ?? null,
            'title'               => $value['title'] ?? null,
            'item_url'            => $value['URL'] ?? null,
            'affiliate_url'       => $value['affiliateURL'] ?? null,
            's_image_url'         => $value['imageURL']['small'] ?? null,
            'l_image_url'         => $value['imageURL']['large'] ?? null,
            'sample_image_url_1'  => $value['sampleImageURL']['sample_s']['image'][0] ?? null,
            'sample_image_url_2'  => $value['sampleImageURL']['sample_s']['image'][1] ?? null,
            'sample_image_url_3'  => $value['sampleImageURL']['sample_s']['image'][2] ?? null,
            'sample_image_url_4'  => $value['sampleImageURL']['sample_s']['image'][3] ?? null,
            'sample_image_url_5'  => $value['sampleImageURL']['sample_s']['image'][4] ?? null,
            'price'               => $value['prices']['price'] ?? null,
            'release_date'        => $value['date'] ?? null,
            'series_name'         => $value['iteminfo']['series'][0]['name'] ?? null,
            'maker_name'          => $value['iteminfo']['maker'][0]['name'] ?? null,
            'director_name'       => $value['iteminfo']['director'][0]['name'] ?? null,
            'label_name'          => $value['iteminfo']['label'][0]['name'] ?? null,
            'volume'              => $value['volume'] ?? null,
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now(),
          ];

          $i ++;
          $itemIds[] = $value['content_id'];
        }
        // 登録処理
        $itemModel->bulkInsert($itemInfo);
        $actress->items()->detach();
        $actress->items()->attach($itemIds);
      }
      Log::info('ItemsTableSeeder success!');
      // dd($itemInfo);
    }
}
