<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbemployee */

$this->title = 'تعديل الموظف: ' . $model->EmpID;
$this->params['breadcrumbs'][] = ['label' => 'الموظفين', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EmpID, 'url' => ['view', 'id' => $model->EmpID]];
$this->params['breadcrumbs'][] = 'تعديل';
?>
<div class="tbemployee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
