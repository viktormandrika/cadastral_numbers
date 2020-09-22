<?php


namespace backend\controllers;


use common\models\CadastralSearchForm;
use Yii;
use yii\web\Controller;

class ParserController extends Controller
{
    public function actionParse()
    {
        $model = new CadastralSearchForm();
        if ($model->load( Yii::$app->request->post() )) {
            $model->parse();
            $dataProvider = $model->search();
        } else {
            $dataProvider = $model->search();
        }
        return $this->render(
            '@app/views/cadastral-number/index',
            ['model' => $model, 'dataProvider' => $dataProvider]
        );
    }
}