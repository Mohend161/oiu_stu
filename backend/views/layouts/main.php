<?php

/* @var $this \yii\web\View */
/* @var $content string */
                     /*<html dir='rtl' xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" lang="ar">*/
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'الرئيسية', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'دخول', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'خروج (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
            <div class="col-sm-2">
                                 <?php
     echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'heading' => 'القائمة الرئيسية',
    'items' => [

         [
            'label' => 'الإعـــدادات',
            'icon' => 'home',
            'items' => [
                ['label' => 'إضــافـــــة مــوظــف', 'icon'=>'info-sign', 'url'=>['/tbemployee/index']],
                ['label' => 'المـــوقف الحــالي', 'icon'=>'phone', 'url'=>['/tblon2/index']],
                 ['label' => 'إعــــادة طــباعــــة', 'icon'=>'question-sign', 'url'=>'#'],
                  ['label' => 'نــــوع البنــــد', 'icon'=>'phone', 'url'=>'#'],

                        ['label' => 'الكليات', 'url' => ['/tbcollege/index']],
                        ['label' => 'العملة', 'url' => ['/tbcurrency/index']],
                        ['label' => 'الاصناف', 'url' => ['/tbitem/index']],
                        ['label' => 'البنود', 'url' => ['/tbsection/index']],
                       ['label' => 'السنة', 'url' => ['/tbyear/index']],
            ],
        ],
      [
            'label' => 'تقارير خاصة',
            'icon' => 'home',
            'items' => [
                ['label' => 'تقرير في شهر محدد', 'icon'=>'info-sign', 'url'=>['/tblon/index']],
                ['label' => 'تقرير في سنة محددة', 'icon'=>'phone', 'url'=>['/tblon2/index']],
            ],
        ],
    ],
]);
   ?>

        </div>
        <div class="col-sm-10">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
