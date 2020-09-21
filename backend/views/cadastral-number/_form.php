<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CadastralNumber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cadastral-number-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cadastralNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
