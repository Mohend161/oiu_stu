<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PoItemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Po Itemes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-iteme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Po Iteme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'po_iteme_no',
            'qte',
            'po_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
