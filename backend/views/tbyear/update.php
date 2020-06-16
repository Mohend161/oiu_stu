<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbyear */

$this->title = 'Update Tbyear: ' . $model->YearID;
$this->params['breadcrumbs'][] = ['label' => 'Tbyears', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->YearID, 'url' => ['view', 'id' => $model->YearID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbyear-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
