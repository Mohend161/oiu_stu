<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbfiltrate */

$this->title = 'Update Tbfiltrate: ' . $model->FiltrID;
$this->params['breadcrumbs'][] = ['label' => 'Tbfiltrates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FiltrID, 'url' => ['view', 'id' => $model->FiltrID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbfiltrate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
