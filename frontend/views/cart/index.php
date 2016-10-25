<?php
use \yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $products common\models\Goods[] */
?>
<h1>Ваш кошик</h1>

<div class="container">
    <div class="row" style="background-color: #990099; color: white; font-weight: bold; font-family: 'Open Sans';padding: 10px;;">
        <div class="col-xs-2">
            Пика
        </div>
        <div class="col-xs-4">
            Наименование
        </div>
        <div class="col-xs-1">
            Код
        </div>
        <div class="col-xs-1">
            Цена
        </div>
        <div class="col-xs-2">
            Количество
        </div>
        <div class="col-xs-1">
            Стоимость
        </div>
        <div class="col-xs-1">
            Удалить
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">&nbsp;</div>
    </div>
    <?php foreach ($products as $product):?>
    <div class="row">
        <div class="col-xs-12" style="padding: 5px; margin-bottom: 2px; margin-top:2px;  border-color: #990099; border-style: solid; border-width: 1px;">
            <div class="col-xs-2">
                <?= Html::a(Html::img('@web/catalog/thumbs/s_'.$product->picture.'.jpg'),['@web/catalog/view?id='.$product->id])?>
            </div>
            <div class="col-xs-4">
                <?= Html::encode($product->title) ?>
            </div>
            <div class="col-xs-1">
                <?= Html::encode($product->code) ?>
            </div>
            <div class="col-xs-1">
                <?= Yii::$app->formatter->asCurrency($product->price) ?>
            </div>
            <div class="col-xs-2">
                <?php Pjax::begin();?>
                <?= $quantity = $product->getQuantity()?>

                <?= Html::a('-', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity - 1], ['class' => 'btn btn-danger', 'disabled' => ($quantity - 1) < 1])?>
                <?= Html::a('+', ['cart/update', 'id' => $product->getId(), 'quantity' => $quantity + 1], ['class' => 'btn btn-success'])?>
                <?php Pjax::end();?>
            </div>
            <div class="col-xs-1">
                <?= Yii::$app->formatter->asCurrency($product->getCost()) ?>
            </div>
            <div class="col-xs-1">
                <?= Html::a('×', ['cart/remove', 'id' => $product->getId()], ['class' => 'btn btn-danger'])?>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <div class="row">
        <div class="col-xs-8">

        </div>
        <div class="col-xs-2">
            Всего: <?= Yii::$app->formatter->asCurrency($total) ?>
        </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        <div class="col-xs-2 pull-right">
            <?php
            if (Yii::$app->user->isGuest){
                echo Html::a('Войти', ['site/login'], ['class' => 'btn btn-danger','style' => 'margin-bottom:5px;']);
                echo Html::a('Зарегистрироваться', ['site/signup'], ['class' => 'btn btn-danger']);
            }
            elseif (Yii::$app->cart->getCost() >= 100){
                echo Html::a('Заказать', ['cart/order'], ['class' => 'btn btn-success']);
            }
            ?>
            <?php// if ($product->getCost() > 100) Html::a('Заказать', ['cart/order'], ['class' => 'btn btn-success']); ?>
        </div>
        <div class="col-xs-2 pull-right">
            <?= Html::a('Очистить', ['cart/clear'], ['class' => 'btn btn-primary'])?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">&nbsp;</div>
    </div>
</div>
