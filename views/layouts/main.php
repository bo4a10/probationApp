<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html,
    yii\bootstrap\Nav,
    yii\bootstrap\NavBar,
    yii\widgets\Breadcrumbs,
    app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?php echo Html::encode(Yii::$app->params['appName']) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel'=> (!(Yii::$app->user->isGuest) && Yii::$app->user->identity->group == 'admin') ? 'Admin' : 'My Company',
        'brandUrl'  => (!(Yii::$app->user->isGuest) && Yii::$app->user->identity->group == 'admin') ? '/admin/admin' : Yii::$app->homeUrl,
        'options'   => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => call_user_func(function() {
            if (!Yii::$app->user->isGuest) {
                return (Yii::$app->user->identity->group == 'admin') ?
                    [
                    ['label'  => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                    ['label' => 'Users manager', 'url' => ['/admin/admin/usersmanager']],
                    ['label' => 'Products', 'url' => ['/admin/product/productmanager']],
                    ] : [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                         'url' => ['/site/logout'],
                         'linkOptions' => ['data-method' => 'post']]
                    ];
            } else {
                return [
                ['label' => 'Signup', 'url' => ['/site/signup']],
                ['label' => 'Login', 'url' => ['/site/login']],
            ];
            }
        }),
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
