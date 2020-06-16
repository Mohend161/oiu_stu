<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbcurrency */

$this->title = 'Create Tbcurrency';
$this->params['breadcrumbs'][] = ['label' => 'Tbcurrencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbcurrency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
