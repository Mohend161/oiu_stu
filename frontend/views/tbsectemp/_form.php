<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbsectemp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbsectemp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EmpNaRe')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
