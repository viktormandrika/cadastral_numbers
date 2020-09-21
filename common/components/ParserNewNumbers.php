<?php


namespace common\components;


use common\models\CadastralNumberSearch;
use common\models\CadastralSearchForm;

class ParserNewNumbers extends Parser
{


    public static function createNewNumbers(CadastralSearchForm $form)
    {
        $parser = new self();
        $parser->cadastralNumbers = $form->not_isset_cadastral_numbers;
        $parser->getDataByNumbers();


    }

    public function getDataByNumbers()
    {
//        var_dump($this->cadastralNumbers);
        var_dump( $this->sendRequest() );
    }
}