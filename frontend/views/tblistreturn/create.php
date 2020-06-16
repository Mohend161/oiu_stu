<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblistreturn */

$this->title = 'Create Tblistreturn';
$this->params['breadcrumbs'][] = ['label' => 'Tblistreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblistreturn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
