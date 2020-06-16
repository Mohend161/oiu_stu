<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TbsecretSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbsecret-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SecrtID') ?>

    <?= $form->field($model, 'PayID') ?>

    <?= $form->field($model, 'PayDate') ?>

    <?= $form->field($model, 'Notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
