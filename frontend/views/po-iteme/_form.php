<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PoIteme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="po-iteme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'po_iteme_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qte')->textInput() ?>

    <?= $form->field($model, 'po_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
