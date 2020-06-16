<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbfiltrate */

$this->title = 'Create Tbfiltrate';
$this->params['breadcrumbs'][] = ['label' => 'Tbfiltrates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbfiltrate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
