<?php


namespace console\controllers;


use common\models\CadastralSearchForm;
use common\renderer\CadastralConsoleRender;
use yii\console\Controller;
use yii\console\widgets\Table;

class CadastralNumbersController extends Controller
{
    public function actionParse($numbers = null)
    {
        $model = new CadastralSearchForm();
        $model->cadastralNumbers = $numbers;
        $model->parse();
        CadastralConsoleRender::render( $model->search() );
    }
}