<?php


namespace common\components;


use yii\httpclient\Client;

class Parser
{
    protected $cadastralNumbers;
    const BASE_URL = 'http://pkk.bigland.ru/api/';


    public function setCadastralNumbers(array $cadastralNumbers)
    {
        foreach ($cadastralNumbers as $index => $cadastralNumber) {
            $this->cadastralNumbers['collection']['plots'] = $cadastralNumber;
        }
    }

    public function sendRequest()
    {
        $client = new Client(
            [
                'baseUrl' => 'http://pkk.bigland.ru/api/',
                'requestConfig' => [
                    'format' => Client::FORMAT_JSON
                ],
                'responseConfig' => [
                    'format' => Client::FORMAT_JSON
                ],
            ]
        );
     return   $response = $client->createRequest()
            ->setMethod( 'POST' )
            ->setFormat( Client::FORMAT_JSON )
            ->setUrl( 'test/plots' )
            ->setData( $this->cadastralNumbers )
            ->send();
    }
}