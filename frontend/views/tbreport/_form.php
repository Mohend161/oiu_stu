<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\report_lon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report_lon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RepName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ty')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
