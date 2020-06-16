<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbsectemp */

$this->title = 'Update Tbsectemp: ' . $model->EmpReID;
$this->params['breadcrumbs'][] = ['label' => 'Tbsectemps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EmpReID, 'url' => ['view', 'id' => $model->EmpReID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbsectemp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
