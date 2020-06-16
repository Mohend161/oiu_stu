<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CatalogOption */

$this->title = 'Create Catalog Option';
$this->params['breadcrumbs'][] = ['label' => 'Catalog Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
