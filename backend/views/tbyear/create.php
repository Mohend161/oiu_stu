<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbyear */

$this->title = 'العام ';
$this->params['breadcrumbs'][] = ['label' => 'Tbyears', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbyear-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
