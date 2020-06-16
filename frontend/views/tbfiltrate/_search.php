<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TbfiltrateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbfiltrate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FiltrID') ?>

    <?= $form->field($model, 'LonID') ?>

    <?= $form->field($model, 'TySectionID') ?>

    <?= $form->field($model, 'ProcedureDate') ?>

    <?= $form->field($model, 'Money') ?>

    <?php // echo $form->field($model, 'Archive') ?>

    <?php // echo $form->field($model, 'YearID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
