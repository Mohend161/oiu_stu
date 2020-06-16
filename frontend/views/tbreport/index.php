<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TbreportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbreports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbreport-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbreport', ['create'], ['class' => 'btn btn-success']) ?>
		 <?= Html::a('_report_lon Tbreport', ['_report_lon'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'RepID',
            'RepName',
            'Ty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
