<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblistreturnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblistreturns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblistreturn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tblistreturn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'RetID',
            'PayID',
            'EmpID',
            'Amount',
            'ItemID',
            //'IsPrint',
            //'Notes',
            //'UserID',
            //'Accept',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
