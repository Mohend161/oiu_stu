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

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'po_iteme_no',
            'qte',
            'po_id',
           ],
    ]); ?>


</div>
