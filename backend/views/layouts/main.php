<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use backend\widgets\Navigation;
use backend\widgets\Header;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <!-- <header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header> -->

    <div class="wrapper">
        <?= Navigation::widget(); ?>
        <div id="content">
            <header>
                <?= Header::widget(); ?>
                <?php if (isset($this->params['breadcrumbs'])) : ?>
                    <div>
                        <div class="col-lg-12">
                            <h2><?= isset($this->params['breadcrumbs'][0]['label']) ? $this->params['breadcrumbs'][0]['label'] : $this->params['breadcrumbs'][0]; ?></h2>
                            <?=
                            Breadcrumbs::widget([
                                'tag' => 'ol',
                                'homeLink' => ['label' => Yii::t('backend', 'Home'), 'url' => url('index')],
                                'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
                                'activeItemTemplate' => "<li class=\"breadcrumb-item active\"><strong>{link}</strong></li>\n",
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'options' => ['class' => 'breadcrumb'],
                            ])
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </header>
            <main id="main">
                <?= $content ?>
            </main>

            <footer class="footer mt-auto py-3 text-muted">
                <div class="container">
                    <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
                    <p class="float-right"><?= Yii::powered() ?></p>
                </div>
            </footer>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
