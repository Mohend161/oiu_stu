<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon */

$this->title = $model->LonID;
$this->params['breadcrumbs'][] = ['label' => 'العهد', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tblon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('تعديل', ['update', 'id' => $model->LonID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->LonID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' =>'هل أنت متأكد من حذف بيانات العهده?',
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
          //  'det',
			'det0.YearName',
           // 'ID',
           // 'UserID',
        ],
    ]) ?>

 
</div>
