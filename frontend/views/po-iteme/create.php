<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PoIteme */

$this->title = 'Create Po Iteme';
$this->params['breadcrumbs'][] = ['label' => 'Po Itemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="po-iteme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
