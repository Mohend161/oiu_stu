<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbcollege */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbcollege-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CollegeName')->textInput(['maxlength' => true]) ?>
    


   <div class="row">
   
   
   
   </div>









    <div class="form-group">
        <?= Html::submitButton('حفظ', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
