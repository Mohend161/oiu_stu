<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbemployee */

$this->title = $model->EmpID;
$this->params['breadcrumbs'][] = ['label' => 'الموظفين', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbemployee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('تعديل', ['update', 'id' => $model->EmpID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->EmpID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'هل أنت متأكد من حذف بيانات الموظف?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'EmpID',
            'EmpName',
            //'Lon',
          //  'isopen',
           // 'oldlon',
          //  'oldisopen',
        ],
    ]) ?>

</div>
