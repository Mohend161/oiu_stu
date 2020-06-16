<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\modal;
use yii\widgets\Pjax;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use frontend\models\tbemployee;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'العهد';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblon-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
     <?= Html::a('<span class=" btn btn-success">  إضافة عهده</span>', ['create'], [
                                    'class' => 'activity-view-link1']);?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal1',
        'size' => 'modal-lg',
        'header' => '<h3>إضافة عهده</h3>'
		
    ]);
    echo "<div id='modalContent1'></div>";Modal::end();

    Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal2',
        'size' => 'modal-lg',
        'header' => '<h3> عرض العهد</h3>'
    ]);
    echo "<div id='modalContent2'></div>";Modal::end();

    Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal3',
        'size' => 'modal-lg',
        'header' => '<h3> تعديل العهد</h3>'
    ]);
    echo "<div id='modalContent3'></div>";Modal::end();Pjax::begin();
    ?>
	<?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
			  'LonID',
            [
			'attribute'=>'EmpID',
			'value'=>'emp.EmpName'
			],

		    [
			'attribute'=>'TypeID',
			'value'=> 'type.TypeName',
			],
		
			[
                'attribute'=>'LonDate',
                'value'=>'LonDate',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'LonDate',
                          'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ]
                ]),

            ],
            'Maount',
            'Note',
            'Notes',
            //'CollegeID',
            //'Note',
            //'Finish',
            //'Notes',
            //'CurrID',
            //'ProcedureDatfin',
            //'Archive',
            //'det',
            //'ID',
            //'UserID',


       [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} ',
                'buttons' =>[
                    'view' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                    'class' => 'activity-view-link2']);
                    },
                    'update' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'class' => 'activity-view-link3']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'data-confirm' => Yii::t('yii', 'هل أنت متأكد من حذف بيانات العهده?'),
                                    'data-method' => 'post', 'data-pjax' => '0',
                                    'title' => Yii::t('app', 'حذف بيانات العهده'),
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model) {
                    if ($action === 'update') {
                        $url = Url::to(['tblon/update', 'id' => $model->LonID]);
                        return $url;
                    }if ($action === 'view') {
                        $url = Url::to(['tblon/view', 'id' => $model->LonID]);
                        return $url;
                    }if ($action === 'delete') {
                        $url = Url::to(['tblon/delete', 'id' => $model->LonID]);
                        return $url;
                    }
                }
            ],
        ],
    ]); Pjax::end();
	
    $this->registerJs("
    $(function(){
        $('.activity-view-link1').click(function (e){
            e.preventDefault();
                $('#activity-modal1').modal('show')
                        .find('#modalContent1')
                        .load($(this).attr('href'));
        });
    });
    $(function(){
        $('.activity-view-link2').click(function (e){
            e.preventDefault();
                $('#activity-modal2').modal('show')
                        .find('#modalContent2')
                        .load($(this).attr('href'));
        });
    });
    $(function(){
        $('.activity-view-link3').click(function (e){
            e.preventDefault();
                $('#activity-modal3').modal('show')
                        .find('#modalContent3')
                        .load($(this).attr('href'));
        });
});");?>
<?php Pjax::end();?>
</div>