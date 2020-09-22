<?php


namespace backend\controllers;


use common\models\CadastralNumber;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = 'common\models\CadastralNumber';

    public function actions()
    {
        $actions = parent::actions();
        unset( $actions['create'] );
        unset( $actions['update'] );
        unset( $actions['delete'] );
        return $actions;
    }

    public function actionFind($number)
    {
             return CadastralNumber::findByNumber( $number );
    }
}