<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tbfiltrate2 */

$this->title = 'Create Tbfiltrate2';
$this->params['breadcrumbs'][] = ['label' => 'Tbfiltrate2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbfiltrate2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
