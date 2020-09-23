<?php


namespace common\models;


use common\components\ParserNewNumbers;

use yii\base\Model;
use yii\httpclient\Response;

/**
 * Class CreateCadasrtalNumbers
 *
 * @package common\models
 * @property Response $response
 */
class CreateCadasrtalNumbers extends Model
{
    /**
     * @var Response $response
     */
    private $response;

    /**
     * @param Response $response
     * @return $this
     */
    protected function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }

    protected function createNumbers()
    {
        foreach ($this->response->data as $number) {
            $model = new CadastralNumber();
            $model->cadastralNumber = $number['number'];
            $model->address = $number['data']['attrs']['address'];
            $model->price = $number['data']['attrs']['cad_cost'];
            $model->area = $number['data']['attrs']['area_value'];
            $model->save();
        }
    }

    /**
     * @param Response $response
     */
    public static function createNewNumbers(Response $response): void
    {
        $model = new self();
        $model->setResponse( $response )->createNumbers();
    }


}