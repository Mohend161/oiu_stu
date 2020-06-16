<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbemployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbemployee-form">

    <?php $form = ActiveForm::begin(['options'=>['id'=>'tbemployee-form']]); ?>
    
    <?= $form->field($model, 'EmpName')->textInput(['maxlength' => true]) ?>

       <?=$form->field($model, 'isopen')->checkbox(['maxlength' => true] )  ?>

      <div class="form-group">
        <?= Html::submitButton('حفظ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
