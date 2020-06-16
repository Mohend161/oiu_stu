<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbsection */

$this->title = 'Update Tbsection: ' . $model->TySectionID;
$this->params['breadcrumbs'][] = ['label' => 'Tbsections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TySectionID, 'url' => ['view', 'id' => $model->TySectionID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbsection-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
