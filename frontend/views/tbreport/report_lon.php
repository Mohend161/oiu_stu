<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbreport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbreport-form">

    <?php $form = ActiveForm::begin(); ?>

   

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
