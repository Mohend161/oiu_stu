<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbsecret */

$this->title = 'Create Tbsecret';
$this->params['breadcrumbs'][] = ['label' => 'Tbsecrets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbsecret-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsTblistreturn' => $modelsTblistreturn,
    ]) ?>

</div>
