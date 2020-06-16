<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbfiltrate2 */

$this->title = 'Update Tbfiltrate2: ' . $model->FiltrID;
$this->params['breadcrumbs'][] = ['label' => 'Tbfiltrate2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FiltrID, 'url' => ['view', 'id' => $model->FiltrID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbfiltrate2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
