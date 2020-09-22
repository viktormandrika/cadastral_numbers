<?php


namespace common\components;


use phpDocumentor\Reflection\Types\This;
use yii\httpclient\Client;

/**
 * Class Parser
 *
 * @package   common\components
 * @property array   $cadastralNumbers
 * @property array   $requestData
 * @property  Client $client
 */
class Parser
{
    /**
     * @var array $cadastralNumbers
     */
    protected $cadastralNumbers;
    /**
     * @var array $requestData
     */
    public $requestData;
    /**
     * @var Client $client
     */
    protected $client;

    protected $errors = [];

    const BASE_URL = 'http://pkk.bigland.ru/api/';
    const REQUEST_FORMAT = Client::FORMAT_JSON;
    const RESPONSE_FORMAT = Client::FORMAT_JSON;

    public function __construct()
    {
        $this->client = new Client(
            [
                'baseUrl' => self::BASE_URL,
                'requestConfig' => [
                    'format' => self::REQUEST_FORMAT
                ],
                'responseConfig' => [
                    'format' => self::RESPONSE_FORMAT
                ],
            ]
        );
    }

    /**
     * @param array $cadastralNumbers
     * @return $this
     */
    protected function setCadastralNumbers(array $cadastralNumbers): self
    {
        foreach ($cadastralNumbers as $index => $cadastralNumber) {
            $this->cadastralNumbers['collection']['plots'] = trim( $cadastralNumber );
        }
        return $this;
    }

    protected function sendRequest()
    {
        $response = $this->client->createRequest()
            ->setMethod( 'POST' )
            ->setFormat( Client::FORMAT_JSON )
            ->setUrl( 'test/plots' )
            ->setData( $this->requestData )
            ->send();
        if (!$response->statusCode !== 200 && $response->data['message']) {
            $this->errors[] = $response->data['message'];
        }
        return $response;
    }

}