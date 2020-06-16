<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbcurrency */

$this->title = 'Update Tbcurrency: ' . $model->CurrID;
$this->params['breadcrumbs'][] = ['label' => 'Tbcurrencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CurrID, 'url' => ['view', 'id' => $model->CurrID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbcurrency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
