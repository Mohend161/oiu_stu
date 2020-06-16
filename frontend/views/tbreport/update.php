<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbreport */

$this->title = 'Update Tbreport: ' . $model->RepID;
$this->params['breadcrumbs'][] = ['label' => 'Tbreports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RepID, 'url' => ['view', 'id' => $model->RepID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbreport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
