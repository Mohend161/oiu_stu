<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 use backend\models\tbyear;
 use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Tbyear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbyear-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'YearID')->textInput() ?>
	
	 <?= $form->field($model, 'YearName')->textInput() ?>
   
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
