<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tblon2 */

$this->title = 'تصفـية العهــد: ' . $model->LonID;
$this->params['breadcrumbs'][] = ['label' => 'تصفـية العهــد', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LonID, 'url' => ['view', 'id' => $model->LonID]];
$this->params['breadcrumbs'][] = 'تصفـية العهــد';
?>
<div class="tblon2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsTbfiltrate' => $modelsTbfiltrate,
    ]) ?>

</div>
