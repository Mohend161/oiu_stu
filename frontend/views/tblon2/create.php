<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon2 */

$this->title = ' تصفية العهده ';
$this->params['breadcrumbs'][] = ['label' => 'Tblon2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblon2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsTbfiltrate' => $modelsTbfiltrate,
    ]) ?>

</div>
