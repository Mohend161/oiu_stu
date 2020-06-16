<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TbsecretSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbsecrets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbsecret-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbsecret', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SecrtID',
            'PayID',
            'PayDate',
            'Notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
