<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbcollege */

$this->title = 'إنشاء كلية';
$this->params['breadcrumbs'][] = ['label' => 'Tbcolleges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbcollege-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
