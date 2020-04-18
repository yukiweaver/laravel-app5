<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consts\FaceApi;
use Log;

class detectIdentifyFace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'detectIdentifyFace';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Face detection and identification with faceAPI';

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
      Log::info('detectIdentifyFaceを実行');

      $request = new \HTTP_Request2(FaceApi::ENDPOINT . 'face/v1.0/detect');
      $url = $request->getUrl();

      $headers = array(
          // Request headers
          'Content-Type' => 'application/json',
          'Ocp-Apim-Subscription-Key' => FaceApi::KEY,
      );

      $request->setHeader($headers);

      $parameters = array(
          // Request parameters
          // 'returnFaceId' => 'true',
          // 'returnFaceLandmarks' => 'false',
          // 'returnFaceAttributes' => '{string}',
          // 'recognitionModel' => 'recognition_01',
          // 'returnRecognitionModel' => 'false',
          // 'detectionModel' => 'detection_01',
      );

      $url->setQueryVariables($parameters);

      $request->setMethod(\HTTP_Request2::METHOD_POST);

      // urlは例で適当な画像
      $body = json_encode(array('url' => 'https://img.fril.jp/img/129852238/m/367937635.jpg'));

      // Request body
      $request->setBody($body);

      try
      {
          $response = $request->send();
          $detectData = json_decode($response->getBody(), true);
      }
      catch (HttpException $ex)
      {
          echo $ex;
      }

      $faceIds = [];
      foreach ($detectData as $val) {
        $faceIds[] = $val['faceId'];
      }

      $request = new \HTTP_Request2(FaceApi::ENDPOINT . 'face/v1.0/identify');
      $url = $request->getUrl();

      $headers = array(
          // Request headers
          'Content-Type' => 'application/json',
          'Ocp-Apim-Subscription-Key' => FaceApi::KEY,
      );

      $request->setHeader($headers);

      $parameters = array(
          // Request parameters
      );

      $url->setQueryVariables($parameters);

      $request->setMethod(\HTTP_Request2::METHOD_POST);

      $params = [
        'faceIds'       => $faceIds,
        'personGroupId' => FaceApi::PERSON_GROUP_ID,
      ];

      $body = json_encode($params);

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
