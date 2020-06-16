<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon2 */

$this->title = $model->LonID;
$this->params['breadcrumbs'][] = ['label' => 'Tblon2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tblon2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->LonID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->LonID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'LonID',
             'emp.EmpName',
             'type.TypeName',
            'LonDate',
            'Maount',
            'curr.CurrName',
            'college.CollegeName',
            'Note',
            'Notes',
          //  'Finish',
          //  'Archive',
           // 'det',
		   	'det0.YearName',
           // 'ID',
           // 'UserID',
        ],
    ]) ?>
  

</div>
