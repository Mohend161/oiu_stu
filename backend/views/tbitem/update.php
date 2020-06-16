<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbitem */

$this->title = 'Update Tbitem: ' . $model->ItemID;
$this->params['breadcrumbs'][] = ['label' => 'Tbitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ItemID, 'url' => ['view', 'id' => $model->ItemID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbitem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
