<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbcollege */

$this->title = $model->CollegeID;
$this->params['breadcrumbs'][] = ['label' => 'الكلية', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbcollege-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('تعديل', ['update', 'id' => $model->CollegeID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->CollegeID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'هل أنت متأكد من حذف بيانات الكلية?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CollegeID',
            'CollegeName',
        ],
    ]) ?>

</div>
