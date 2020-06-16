<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbsectemp */

$this->title = 'Create Tbsectemp';
$this->params['breadcrumbs'][] = ['label' => 'Tbsectemps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbsectemp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
