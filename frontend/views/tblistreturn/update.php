<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblistreturn */

$this->title = 'Update Tblistreturn: ' . $model->RetID;
$this->params['breadcrumbs'][] = ['label' => 'Tblistreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RetID, 'url' => ['view', 'id' => $model->RetID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblistreturn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
