<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\tbemployee;
use frontend\models\Tbitem;
use frontend\models\Tbcurrency;
use frontend\models\Tbcollege;
use frontend\models\Tbsection;
use frontend\models\tbyear;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use dosamigos\datepicker\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon2 */
/* @var $form yii\widgets\ActiveForm
 <?php $form = ActiveForm::begin(['options'=>['id'=>'tblon-form']]); ?> */
?>

<div class="tblon2-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
	
         <?= $form->field($model, 'PayID')->widget(Select2::classname(), [
    'data' =>  ArrayHelper::map($model::find()->all(),'PayID','PayID'),
    'language' => 'en',
    'options' => ['placeholder' => 'إختار  رقم الإذن'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

<?= $form->field($model, 'PayDate')->widget(
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

    <div class="row">
   <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>  تصفية العهده </h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsTblistreturn[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'TySectionID',
                    'ProcedureDate',
					'Money',
					
				],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsTblistreturn as $i => $modelsTbfiltrates): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">  البند</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsTbfiltrates->isNewRecord) {
                                echo Html::activeHiddenInput($modelsTbfiltrates, "[{$i}]PayID");
								
                            }
                        ?>
                      
                        <div class="row">
                           
								<div class="col-sm-4">
                           			
			 <?= $form->field($modelsTbfiltrates,"[{$i}]EmpID")->widget(Select2::classname(), [
                  				    'data' =>  ArrayHelper::map(tbemployee::find()->all(),'EmpID','EmpName'),
                   'language' => 'en',
                   'options' => ['placeholder' => 'إختار البند'],
                   'pluginOptions' => [
                   'allowClear' => true
                  ],
             ]);?> 
			 									
							   </div>
							   	<div class="col-sm-4">
                           			
			 <?= $form->field($modelsTbfiltrates,"[{$i}]ItemID")->widget(Select2::classname(), [
                  				    'data' =>  ArrayHelper::map(Tbitem::find()->all(),'ItemID','ItemName'),
                   'language' => 'en',
                   'options' => ['placeholder' => 'إختار البند'],
                   'pluginOptions' => [
                   'allowClear' => true
                  ],
             ]);?> 
			 									
							   </div>
							    <div class="col-sm-4">
                                <?= $form->field($modelsTbfiltrates, "[{$i}]Amount")->textInput(['maxlength' => true,]) ?>
                            </div>
                        </div><!-- .row -->
						
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
  </div>
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'حفظ', ['class' => 'btn btn-primary']) ?>
       </div>
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("هل أنت متأكد من حذف بيانات هذا البند ?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});
</script>
