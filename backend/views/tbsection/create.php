<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbsection */

$this->title = 'Create Tbsection';
$this->params['breadcrumbs'][] = ['label' => 'Tbsections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbsection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
