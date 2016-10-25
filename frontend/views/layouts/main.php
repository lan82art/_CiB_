<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container" style="border: solid; border-color: #990099; border-width: 1px; text-align: center;">
        <p><h4>некоторый контент</h4></p>
    </div>
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <?= Html::a(Html::img('@web/images/logo-small.gif', ['class' => 'pull-left']),['/site/index']) ?>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6"></div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                <?php
                if (Yii::$app->user->isGuest && !(Yii::$app->cart->getIsEmpty())){
                    echo '<div style="border: solid 1px #990099; padding: 5px;">Для сохранения заказа необходимо войти на сайт!!!</div>';
                }?>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
            <?php
            //Pjax::begin();
                $itemsInCart = Yii::$app->cart->getCount();
                $totalPrice = Yii::$app->cart->getCost();

                echo Html::a(Html::label('<div style="border: solid 1px #990099; padding: 5px;"><div id="cart" class="glyphicon glyphicon-shopping-cart"></div><div id="itemsincart" class="badge">'.($itemsInCart ? "$itemsInCart" : '0').'</div></div>', ['class' => 'pull-right']), ['/cart/index']);
            //Pjax::end()
            ?>
            </div>
        </div>
    </div>
    <?php
    NavBar::begin([
        //'brandLabel' => 'CiB',
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
            'style' => "font-family:'Open Sans'; font-weight:bold;"
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'О компании', 'url' => ['/site/about']],
        ['label' => 'Акции', 'url' => ['/site/offers']],
        ['label' => 'Каталог', 'url' => ['/catalog/index']],
        ['label' => 'Публикации', 'url' => ['/articles/index']],
        ['label' => 'Обратная звязь', 'url' => ['/site/contact']],
        ['label' => 'Контакты', 'url' => ['/site/gmap']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> Здравствуйте: '.Yii::$app->user->identity->username,
            'items' => [
                ['label' => 'Профиль', 'url' => ['/profile/index']],
                ['label' => 'Мои заказы', 'url' => ['/vieworder/index/']],
                ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
            ]
        ];
    }
    echo NavX::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div id="foot" class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <p>Контакты магазин <span class="glyphicon glyphicon-info-sign"></span></p> <br>
                <p>
                    <span class="glyphicon glyphicon-home"></span>
                    г. Харьков, <br> &nbsp;&nbsp;&nbsp; ул. Кооперативная 22 <br>
                    <span class="glyphicon glyphicon-earphone"></span>
                    (057) 731 32 14 <br>
                    <span class="glyphicon glyphicon-earphone"></span>
                    (057) 731 18 63
                </p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <p>Контакты заказы <span class="glyphicon glyphicon-info-sign"></span></p><br>
                <p>
                    <span class="glyphicon glyphicon-earphone"></span>
                    (057) 731 32 14 <br>
                    <span class="glyphicon glyphicon-earphone"></span>
                    (057) 731 18 63 <br>
                    <span class="glyphicon glyphicon-phone"></span>
                    (096) 397-88-14 <br>
                    <span class="glyphicon glyphicon-phone"></span>
                    (066) 174-21-51
                </p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <p>Контакты редакция <span class="glyphicon glyphicon-info-sign"></span></p><br>
                <p>
                    <span class="glyphicon glyphicon-earphone"></span>
                    (057) 731 32 14 <br>
                    <span class="glyphicon glyphicon-earphone"></span>
                    (057) 731 18 63 <br>
                    <span class="glyphicon glyphicon-phone"></span>
                    (096) 397-88-14 <br>
                    <span class="glyphicon glyphicon-phone"></span>
                    (066) 174-21-51
                </p>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <p>Контакты безналичный расчет <span class="glyphicon glyphicon-info-sign"></span></p><br>
                <p>
                    <span class="glyphicon glyphicon-phone"></span>
                    (096) 718 12 99 <br>
                    <span class="glyphicon glyphicon-phone"></span>
                    (066) 879 39 90
                </p>
            </div>
        </div>
        <!--<p class="pull-right"><?php // Yii::powered() ?></p>-->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="pull-left ">&copy; CiB <?= date('Y') ?></p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
