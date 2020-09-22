<?php


namespace common\components;


use common\models\CadastralNumberSearch;
use common\models\CadastralSearchForm;
use common\models\CreateCadasrtalNumbers;
use yii\httpclient\Response;

/**
 * Class ParserNewNumbers
 *
 * @package common\components
 * @property Response $response
 */
class ParserNewNumbers extends Parser
{
    /**
     * @var Response $response
     */
    public $response;


    /**
     * @param CadastralSearchForm $form
     * @return static
     */
    public static function getInformationAboutNumbers(CadastralSearchForm $form): self
    {
        $parser = new self();
        $parser->cadastralNumbers = $form->getNotIssetCadastralNumbers();
        $parser->setDataByNumbers();
        return $parser;
    }

    public function saveInformationAboutNumbers(): self
    {
        if ($this->response->statusCode == 200) {
            CreateCadasrtalNumbers::createNewNumbers( $this->response );
        }

        return $this;
    }


    private function prepareRequestData()
    {
        $this->requestData['collection']['plots'] = $this->cadastralNumbers;
    }


    private function setDataByNumbers()
    {
        $this->prepareRequestData();
        $this->response = $this->sendRequest();
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }


}