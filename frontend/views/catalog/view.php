<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Goods */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <?= Html::img('@web/catalog/'.$model->picture.'.jpg')?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        	<div>
                <h3><?= Html::encode($model->GoodsCategoryTitle) ?></h3>
                <h1><?= Html::encode($model->title) ?></h1>
                <h3><?= Html::encode($model->code) ?></h3>
                <h3><?= Html::encode(Yii::$app->formatter->asCurrency($model->price));?></h3>
                <?php
                ?>
                <div class="col-xs-12">
                    <?php if (\Yii::$app->cart->getPositionById($model->id)){
                        echo Html::a('Вже у кошику' , ['cart/add', 'id' => $model->id],['class' => 'btn btn-success', 'style' => 'background:green; border-color:green;']);
                    }
                    else
                    {
                        echo Html::a('Додати до кошика' , ['cart/add', 'id' => $model->id],['class' => 'btn btn-primary', 'style' => 'background:#990099; border-color:#990099;']);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <h3>Описание</h3>
            <?= Html::encode($model->descript_id)?>
        </div>
    </div>
</div>
