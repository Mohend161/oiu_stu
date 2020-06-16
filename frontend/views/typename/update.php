<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Typename */

$this->title = 'Update Typename: ' . $model->typeID;
$this->params['breadcrumbs'][] = ['label' => 'Typenames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->typeID, 'url' => ['view', 'id' => $model->typeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="typename-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
