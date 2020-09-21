<?php


namespace backend\controllers;


use common\components\Parser;
use common\models\CadastralNumberSearch;
use common\models\CadastralSearchForm;
use Yii;
use yii\httpclient\Client;
use yii\web\Controller;

class ParserController extends Controller
{
    public function actionParse()
    {
        //        $parser = new Parser();
        //        $parser->setCadastralNumbers( ['69:27:0000022:1306'] );
        //        $response = $parser->sendRequest();

        $model = new CadastralSearchForm();
        if ($model->load( Yii::$app->request->post() )) {
            $model->setNumbers();
            $model->check();
            $model->createNewCadastralNumbers();
            $dataProvider = $model->search();
        } else {
//            $searchModel = new CadastralNumberSearch();
//            $dataProvider = $searchModel->search( Yii::$app->request->queryParams );
            $model->setNumbers();
            $dataProvider = $model->search();
        }
        return $this->render(
            '@app/views/cadastral-number/index',
            ['model' => $model, 'dataProvider' => $dataProvider]
        );
    }
}