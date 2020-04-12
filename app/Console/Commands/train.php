<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consts\FaceApi;
use Log;

class train extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'train';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'PersonGroup - Train with faceAPI';

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
      Log::info('trainを実行');

      $request = new \HTTP_Request2(FaceApi::ENDPOINT . 'face/v1.0/persongroups/' . FaceApi::PERSON_GROUP_ID . '/train');
      $url = $request->getUrl();

      $headers = array(
          // Request headers
          'Ocp-Apim-Subscription-Key' => FaceApi::KEY,
      );

      $request->setHeader($headers);

      $parameters = array(
          // Request parameters
      );

      $url->setQueryVariables($parameters);

      $request->setMethod(\HTTP_Request2::METHOD_POST);

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
