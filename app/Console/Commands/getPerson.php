<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Consts\FaceApi;
use Log;

class getPerson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getPerson';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'PersonGroup Person-Get with faceAPI';

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
      Log::info('getPersonを実行');

      $personInfo = FaceApi::getPersonInfo();
      $RegisteredPersonInfo = $personInfo['registered_person_info'];
      if (empty($RegisteredPersonInfo)) {
        Log::info('RegisteredPersonInfoが存在しません。処理を終了します。');
        dd('RegisteredPersonInfoが存在しません。処理を終了します。');
        exit;
      }
      foreach ($RegisteredPersonInfo as $person) {

        $request = new \HTTP_Request2(FaceApi::ENDPOINT . 'face/v1.0/persongroups/' . FaceApi::PERSON_GROUP_ID . '/persons/' . $person['person_id']);
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
}
