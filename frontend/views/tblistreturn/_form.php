<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblistreturn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblistreturn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PayID')->textInput() ?>

    <?= $form->field($model, 'EmpID')->textInput() ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'ItemID')->textInput() ?>

    <?= $form->field($model, 'IsPrint')->textInput() ?>

    <?= $form->field($model, 'Notes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UserID')->textInput() ?>

    <?= $form->field($model, 'Accept')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
