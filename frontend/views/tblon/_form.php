<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\tbemployee;
use frontend\models\Tbtypelan;
use frontend\models\Tbcurrency;
use frontend\models\Tbcollege;
use backend\models\tbyear;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tblon-form">

     <?php $form = ActiveForm::begin(['options'=>['id'=>'tblon-form']]); ?>
   
   <div class="row">
   	  <div class="col-md-4">
	 	  <?= $form->field($model, 'det')->dropDownList(
     ArrayHelper::map(tbyear::find()->all(),'YearID','YearName'),
      ['prompt'=>'إختارالعام']
    )
     ?>
	 </div>
   </div>
	   <div class="row">
  <div class="col-md-4">
                   <?= $form->field($model, 'EmpID')->widget(Select2::classname(), [
    'data' =>  ArrayHelper::map(tbemployee::find()->all(),'EmpID','EmpName'),
    'language' => 'en',
    'options' => ['placeholder' => 'إختار موظف'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
       </div>
        <div class="col-md-4">

  <?= $form->field($model, 'TypeID')->dropDownList(
     ArrayHelper::map(Tbtypelan::find()->all(),'TypeID','TypeName'),
      ['prompt'=>'إختار نوع العهده']
    )
     ?>
         </div>
        <div class="col-md-4">     
	
	 <?= $form->field($model, 'LonDate')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
		   'language' => 'ar',
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ]
]);?>
       </div>
    </div>
	
         <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'Maount')->textInput() ?>
       </div>
        <div class="col-md-4">

       <?= $form->field($model, 'CurrID')->dropDownList(
     ArrayHelper::map(Tbcurrency::find()->all(),'CurrID','CurrName'),
      ['prompt'=>'إختار اسم العملة']
    )
     ?>

       </div>
        <div class="col-md-4">

            <?= $form->field($model, 'CollegeID')->widget(Select2::classname(), [
    'data' =>  ArrayHelper::map(Tbcollege::find()->all(),'CollegeID','CollegeName'),
    'language' => 'en',
    'options' => ['placeholder' => 'إختار كلية'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
             </div>


       </div>

     <div class="row">

        <div class="col-md-12">
        <?= $form->field($model, 'Note')->textarea(['rows' => 3]) ?>
              </div>
       </div>
	   
         <div class="row">
        <div class="col-md-12">

            <?= $form->field($model, 'Notes')->textarea(['rows' => 3]) ?>
		       </div>
         </div>
    <div class="form-group">
        <?= Html::submitButton('حفظ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


        </div>
