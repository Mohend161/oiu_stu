<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TbfiltrateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbfiltrates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbfiltrate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbfiltrate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'FiltrID',
            'LonID',
            'TySectionID',
            'ProcedureDate',
            'Money',
            //'Archive',
            //'YearID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
