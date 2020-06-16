<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon */

$this->title = 'تعديل العهده: ' . $model->LonID;
$this->params['breadcrumbs'][] = ['label' => 'العهد', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LonID, 'url' => ['view', 'id' => $model->LonID]];
$this->params['breadcrumbs'][] = 'تعديل';
?>
<div class="tblon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
