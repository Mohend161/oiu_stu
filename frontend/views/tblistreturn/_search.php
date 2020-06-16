<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblistreturnSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblistreturn-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'RetID') ?>

    <?= $form->field($model, 'PayID') ?>

    <?= $form->field($model, 'EmpID') ?>

    <?= $form->field($model, 'Amount') ?>

    <?= $form->field($model, 'ItemID') ?>

    <?php // echo $form->field($model, 'IsPrint') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <?php // echo $form->field($model, 'UserID') ?>

    <?php // echo $form->field($model, 'Accept') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
