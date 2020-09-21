<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CadastralNumber */

$this->title = 'Create Cadastral Number';
$this->params['breadcrumbs'][] = ['label' => 'Cadastral Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadastral-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
