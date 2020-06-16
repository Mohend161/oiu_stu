<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\modal;
use yii\widgets\Pjax;
use yii\helpers\Url;;

 use frontend\models\PoItemeSearch;
//
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<span class=" btn btn-success">إضافة كلية جديدة</span>', ['create'], [
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
        'header' => '<h3>كلية جديدة </h3>'
    ]);
    echo "<div id='modalContent1'></div>";Modal::end();

    Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal2',
        'size' => 'modal-lg',
        'header' => '<h3> عرض الكلية </h3>'
    ]);
    echo "<div id='modalContent2'></div>";Modal::end();

    Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal3',
        'size' => 'modal-lg',
        'header' => '<h3>تعديل الكلية</h3>'
    ]);
    echo "<div id='modalContent3'></div>";Modal::end();Pjax::begin();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
		[
    'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
   			$searchModel = new PoItemeSearch();
		    $searchModel->po_id =$model->id;
			  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			  // return "demo here";
            return Yii::$app->controller->renderPartial('_poitemes', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			]
			);
           
        },
],
            'id',
            'po_no',
            'note:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
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
                                    'data-confirm' => Yii::t('yii', 'هل أنت متأكد من حذف بيانات الكلية?'),
                                    'data-method' => 'post', 'data-pjax' => '0',
                                    'title' => Yii::t('app', 'حذف بيانات الكلية'),
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model) {
                    if ($action === 'update') {
                        $url = Url::to(['po/update', 'id' => $model->id]);
                        return $url;
                    }if ($action === 'view') {
                        $url = Url::to(['po/view', 'id' => $model->id]);
                        return $url;
                    }if ($action === 'delete') {
                        $url = Url::to(['po/delete', 'id' => $model->id]);
                        return $url;
                    };
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


</div>