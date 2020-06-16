<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon */

$this->title = 'إضافة عهده';
$this->params['breadcrumbs'][] = ['label' => 'العهد', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
