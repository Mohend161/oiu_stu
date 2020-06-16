<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TbemployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbemployee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'EmpID') ?>

    <?= $form->field($model, 'EmpName') ?>

    <?= $form->field($model, 'Lon') ?>

    <?= $form->field($model, 'isopen') ?>

    <?= $form->field($model, 'oldlon') ?>

    <?php // echo $form->field($model, 'oldisopen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
