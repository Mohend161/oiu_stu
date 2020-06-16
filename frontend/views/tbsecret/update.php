<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbsecret */

$this->title = 'Update Tbsecret: ' . $model->PayID;
$this->params['breadcrumbs'][] = ['label' => 'Tbsecrets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PayID, 'url' => ['view', 'id' => $model->PayID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbsecret-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
