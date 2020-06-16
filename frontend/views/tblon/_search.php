<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'LonID') ?>

    <?= $form->field($model, 'LonDate') ?>

    <?= $form->field($model, 'Maount') ?>

    <?= $form->field($model, 'EmpID') ?>

    <?= $form->field($model, 'TypeID') ?>

    <?php // echo $form->field($model, 'CollegeID') ?>

    <?php // echo $form->field($model, 'Note') ?>

    <?php // echo $form->field($model, 'Finish') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <?php // echo $form->field($model, 'CurrID') ?>

    <?php // echo $form->field($model, 'ProcedureDatfin') ?>

    <?php // echo $form->field($model, 'Archive') ?>

    <?php // echo $form->field($model, 'det') ?>

    <?php // echo $form->field($model, 'ID') ?>

    <?php // echo $form->field($model, 'UserID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
