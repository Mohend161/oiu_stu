<?php

/* @var $this \yii\web\View */
/* @var $content string */
//<html dir='rtl' xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" lang="ar">
//<html dir='rtl' xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" lang="ar">
//<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
        ['label' => 'القائمة الرئيسية', 'url' => ['/site/index']],
        ['label' => 'حول', 'url' => ['/site/about']],
        ['label' => 'اتصل بنا', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'تسجيل ', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'دخول', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'تسجيل خروج(' . Yii::$app->user->identity->username . ')',
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
         <div class="col-md-2">
                 <?php
     echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'heading' => 'القائمة الرئيسية',
    'items' => [

         [
            'label' => 'العـــهـــــــد',
            'icon' => 'home',
            'items' => [
                ['label' => 'إدخـــال عهــــده', 'icon'=>'info-sign', 'url'=>['/tblon/index']],
                ['label' => 'تصفـــية عهـــــده', 'icon'=>'phone', 'url'=>['/tblon2/index']],
                 ['label' => 'التســوية الشهــرية', 'icon'=>'question-sign', 'url'=>'#'],
                  ['label' => 'الأرشفـــــــة', 'icon'=>'phone', 'url'=>'#'],
                ['label' => 'التقــاريــر', 'icon'=>'question-sign', 'url'=>['/tbreport/report_lon']],
            ],
        ],
      [
            'label' => 'المرتجعــات',
            'icon' => 'home',
            'items' => [
                ['label' => 'إدخــال المرتجعــات', 'icon'=>'info-sign', 'url'=>['/tblistreturn/index']],
                ['label' => 'البحــــث', 'icon'=>'phone', 'url'=>['/tbsecret/index']],
                 ['label' => 'التقــــارير', 'icon'=>'question-sign', 'url'=>'#'],
                  ['label' => 'طباعـــة مرتجــــع', 'icon'=>'phone', 'url'=>'#'],
                 ['label' => 'التقــاريــر', 'icon'=>'question-sign', 'url'=>'#'],
            ],
        ],
         [
            'label' => 'تقارير العهـــــد',
            'icon' => 'home',
            'items' => [
                ['label' => 'تقرير في فترة معينة',  'url'=>['/tblson/index']],
                ['label' =>  'تقرير يوضح تصفية العهد', 'url'=>['/tbslon2/index']],
                 ['label' =>  'التسوية الشهرية',  'url'=>['/tblson2/index']],
            ],
        ],
    ],
]);
   ?>

 </div>
              <div class="col-md-10">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

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
