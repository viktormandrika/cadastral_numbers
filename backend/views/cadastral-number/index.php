<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CadastralNumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadastral Numbers';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cadastral-number-index">

    <h1><?= Html::encode( $this->title ) ?></h1>
    <p>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field( $model, 'cadastralNumbers' )->textInput( ['maxlength' => true] ) ?>

    <div class="form-group">
        <?= Html::submitButton( 'Получить данные', ['class' => 'btn btn-success'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'cadastralNumber',
                'address',
                'price',
                'area',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]
    ); ?>

    <?php Pjax::end(); ?>

</div>
