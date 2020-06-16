<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\modal;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbitems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbitem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
     <?= Html::a('<span class=" btn btn-success">  add Tbitems</span>', ['create'], [
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
        'header' => '<h3>add Tbitems</h3>'
    ]);
    echo "<div id='modalContent1'></div>";Modal::end();

    Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal2',
        'size' => 'modal-lg',
        'header' => '<h3> Tbitems </h3>'
    ]);
    echo "<div id='modalContent2'></div>";Modal::end();

    Modal::begin([
        'closeButton' => [
            'label' => '<span aria-hidden="true">&times;</span>',
            'class' => 'close pull-left',
        ],
        'id' => 'activity-modal3',
        'size' => 'modal-lg',
        'header' => '<h3> edit Tbitems</h3>'
    ]);
    echo "<div id='modalContent3'></div>";Modal::end();Pjax::begin();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ItemID',
            'ItemName',

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
                                    'data-confirm' => Yii::t('yii', 'åá ÃäÊ ãÊÃßÏ ãä ÍÐÝ ÈíÇäÇÊ ÇáÝÑÞÉ?'),
                                    'data-method' => 'post', 'data-pjax' => '0',
                                    'title' => Yii::t('app', 'ÍÐÝ ÈíÇäÇÊ ÇáÝÑÞÉ'),
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model) {
                    if ($action === 'update') {
                        $url = Url::to(['tbitem/update', 'id' => $model->ItemID]);
                        return $url;
                    }if ($action === 'view') {
                        $url = Url::to(['tbitem/view', 'id' => $model->ItemID]);
                        return $url;
                    }if ($action === 'delete') {
                        $url = Url::to(['tbitem/delete', 'id' => $model->ItemID]);
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


</div>