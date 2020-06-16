<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbfiltrate2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbfiltrate2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LonID')->textInput() ?>

    <?= $form->field($model, 'TySectionID')->textInput() ?>

    <?= $form->field($model, 'ProcedureDate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Money')->textInput() ?>

    <?= $form->field($model, 'Archive')->textInput() ?>

    <?= $form->field($model, 'YearID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
