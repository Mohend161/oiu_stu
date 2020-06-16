<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbcollege */

$this->title = 'تعديل الكلية : ' . $model->CollegeID;
$this->params['breadcrumbs'][] = ['label' => 'الكلية', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CollegeID, 'url' => ['view', 'id' => $model->CollegeID]];
$this->params['breadcrumbs'][] = 'تعديل';
?>
<div class="tbcollege-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
