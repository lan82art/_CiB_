<?php

use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $products common\models\Goods[] */
?>
<h1>Your order</h1>

<div class="container">
    <div class="row" style="background-color: #990099; color: white; font-weight: bold; font-family: 'Open Sans';padding: 10px;;">
        <div class="col-xs-4">
            Наименование
        </div>
        <div class="col-xs-1">
            Шото
        </div>
        <div class="col-xs-2">
            Цена
        </div>
        <div class="col-xs-2">
            Количество
        </div>
        <div class="col-xs-2">
            Стоимость
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">&nbsp;</div>
    </div>

    <?php foreach ($products as $product):?>
    <div class="row">
        <div class="col-xs-4">
            <?= Html::encode($product->title) ?>
        </div>
        <div class="col-xs-1">
            Шото
        </div>
        <div class="col-xs-2">
            <?= Yii::$app->formatter->asCurrency($product->price) ?>
        </div>
        <div class="col-xs-2">
            <?= $quantity = $product->getQuantity()?>
        </div>
        <div class="col-xs-2">
            <?= Yii::$app->formatter->asCurrency($product->getCost()) ?>
        </div>
    </div>

    <?php endforeach ?>
    <div class="row">
        <div class="col-xs-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            &nbsp;
        </div>
        <div class="col-xs-1">
            &nbsp;
        </div>
        <div class="col-xs-2">
            &nbsp;
        </div>
        <div class="col-xs-2">
            &nbsp;
        </div>
        <div class="col-xs-2">
            Всего: <?= $total ?> грн.
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php
            /* @var $form ActiveForm */
            $form = ActiveForm::begin([
                'id' => 'order-form',
            ]) ?>

            <?= $form->field($order, 'delivery')->dropDownList(ArrayHelper::map(\common\models\Delivery::find()->all(),'id','delivery_name'),['prompt'=>'Выберите доставку']) ?>
            <?= $form->field($order, 'notes')->textarea()?>

            <div class="form-group row">
                <div class="col-xs-12">
                    <?= Html::submitButton('Order', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>