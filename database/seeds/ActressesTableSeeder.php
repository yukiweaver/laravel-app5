<?php

use Illuminate\Database\Seeder;
use App\Actress;
use App\Api\DmmApi;
use App\COnsts\FaceConst;

class ActressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $actressInfo = [];
      $actressList = FaceConst::ACTRESS_LIST;
      foreach ($actressList as $val) {
        $actressModel = app()->make('Actress');
        if ($actressModel->searchByName($val['name'])->isNotEmpty()) {
          continue;
        }
        $dmmApi = new DmmApi('1', '', '', $val['name'], 'id');
      }
    }
}
