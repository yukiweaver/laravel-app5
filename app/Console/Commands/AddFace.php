<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consts\FaceConst;
use Log;

class AddFace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addFace';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'PersonGroup Person - Add Face with faceAPI';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      Log::info('addFaceを実行します。');

      $faceApi = new FaceConst;
      $personInfo = $faceApi->getUnregisteredPersonInfo();
      $UnregisteredPersonInfo = $personInfo['unregist_image_persons'];
      // dd($UnregisteredPersonInfo);
      if (empty($UnregisteredPersonInfo)) {
        Log::info('UnregisteredPersonInfoが存在しません。処理を終了します。');
        dd('UnregisteredPersonInfoが存在しません。処理を終了します。');
        exit;
      }

      foreach ($UnregisteredPersonInfo as $person) {
        $request = new \HTTP_Request2(FaceConst::ENDPOINT . 'face/v1.0/persongroups/' . FaceConst::PERSON_GROUP_ID . '/persons/' . $person['person_id'] . '/persistedFaces');
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Content-Type' => 'application/json',
            'Ocp-Apim-Subscription-Key' => FaceConst::KEY,
        );

        $request->setHeader($headers);

        $parameters = array(
            // Request parameters
            // 'userData' => '{string}',
            // 'targetFace' => '{string}',
            // 'detectionModel' => 'detection_01',
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(\HTTP_Request2::METHOD_POST);

        $body = json_encode(array('url' => $person['image']));

        // Request body
        $request->setBody($body);

        try
        {
            $response = $request->send();
            echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }
      }
    }
}
