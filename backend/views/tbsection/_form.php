<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbsection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbsection-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TySectionName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
