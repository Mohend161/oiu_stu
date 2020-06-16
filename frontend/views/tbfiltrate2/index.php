<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TbfiltrateSearch2 */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbfiltrate2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbfiltrate2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbfiltrate2', ['create'], ['class' => 'btn btn-success']) ?>
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
