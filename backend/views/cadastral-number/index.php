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
<?php if($model->errors ):?>
<?php foreach ($model->errors as $index => $error) :?>
    <p><?php echo $error ?></p>
<?php endforeach; ?>
<?php endif; ?>
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

    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'columns' => [
                'cadastralNumber',
                'address',
                'price',
                'area',

            ],
        ]
    ); ?>

    <?php Pjax::end(); ?>

</div>
