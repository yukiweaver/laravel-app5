<?php

use Illuminate\Database\Seeder;
use App\Actress;
use App\Consts\DmmConst;
use App\Consts\FaceConst;
use Carbon\Carbon;

class ActressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Eloquent::unguard();
      $propertyInfo = DmmConst::PROPERTY_INFO;
      $actressInfo = [];
      $actressList = FaceConst::ACTRESS_LIST;
      $actressModel = app()->make('App\Actress');

      foreach ($actressList as $val) {

        // すでに登録されていればスキップ
        if ($actressModel->searchByName($val['name'])->isNotEmpty()) {
          continue;
        }

        $propertyInfo['keyword'] = $val['name'];
        $dmmApi = app()->makeWith('DmmApi', $propertyInfo);
        $apiResult = $dmmApi->apiActressSearch();

        // API実行結果が0件ならスキップ
        if ($apiResult['result_count'] == 0) {
          continue;
        }

        $actress = $apiResult['actress'][0];
        $actressInfo[] = [
          'id'          => $actress['id'] ?? null,
          'name'        => $actress['name'] ?? null,
          'name_kana'   => $actress['ruby'] ?? null,
          'bust'        => $actress['bust'] ?? null,
          'cup'         => $actress['cup'] ?? null,
          'waist'       => $actress['waist'] ?? null,
          'hip'         => $actress['hip'] ?? null,
          'height'      => $actress['height'] ?? null,
          'birthday'    => $actress['birthday'] ?? null,
          'blood_type'  => $actress['blood_type'] ?? null,
          'hobby'       => $actress['hobby'] ?? null,
          'prefectures' => $actress['prefectures'] ?? null,
          'image_url'   => $actress['imageURL']['large'] ?? null,
          'created_at'  => Carbon::now(),
          'updated_at'  => Carbon::now(),
        ];
      }
      $actressModel->bulkInsert($actressInfo);
    }
}
