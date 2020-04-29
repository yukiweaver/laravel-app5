<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Log::info('GenresTableSeeder start!');
      Eloquent::unguard();
      $genreModel = app()->make('App\Genre');
      $propertyInfo = DmmConst::PROPERTY_INFO;
      $dmmApi = app()->makeWith('DmmApi', $propertyInfo);

      // ジャンル取得API実行
      $apiGenresResult = $dmmApi->apiGenresSearch();

      if ($apiGenresResult['status'] != 200) {
        dd('API実行中にエラー発生。ログを確認してください。');
      }

      $genres = $apiGenresResult['genre'];

      $genreInfo = [];
      foreach ($genres as $genre) {
        $genreInfo[] = [
          'id'          => $genre['genre_id'],
          'name'        => $genre['name'],
          'created_at'  => Carbon::now(),
          'updated_at'  => Carbon::now(),
        ];
      }

      // 登録処理
      $genreModel->bulkInsert($genreInfo);
      Log::info('GenresTableSeeder success');
    }
}
