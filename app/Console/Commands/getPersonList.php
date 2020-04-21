<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consts\FaceConst;
use Log;

class getPersonList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getPersonList';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'PersonGroup Person - List with faceAPI';

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
      Log::info('getPersonListを実行');

      $request = new \HTTP_Request2(FaceConst::ENDPOINT . 'face/v1.0/persongroups/' . FaceConst::PERSON_GROUP_ID . '/persons');
      $url = $request->getUrl();

      $headers = array(
          // Request headers
          'Ocp-Apim-Subscription-Key' => FaceConst::KEY,
      );

      $request->setHeader($headers);

      $parameters = array(
          // Request parameters
          'start' => '',
          'top' => '1000',
      );

      $url->setQueryVariables($parameters);

      $request->setMethod(\HTTP_Request2::METHOD_GET);

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
