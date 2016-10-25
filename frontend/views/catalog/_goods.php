<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
//use yz\shoppingcart\ShoppingCart;
//use yii\widgets\ActiveForm;
//<div class="glyphicon glyphicon-shopping-cart"></div>
?>
<?php /** @var $model \common\models\Goods
          @var $cart  \yz\shoppingcart\ShoppingCart */ ?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style=" padding: 5px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px; border: 1px solid #6F2797; padding: 5px;">
        <?= Html::a(Html::img('@web/catalog/thumbs/s_'.$model->picture.'.jpg'),['@web/catalog/view?id='.$model->id])?>
        <div style="height: 3em;"><h5><?= Html::encode($model->title)?></h5></div>
        <h4><?= Html::encode(Yii::$app->formatter->asCurrency($model->price)) ?></h4>
        <h4><?= Html::encode($model->fas) ?> <?= Html::encode($model->izmer) ?></h4>
        <div class="col-xs-12" style="text-align: center;">
            <?php Pjax::begin(['id' => 'pjax_' . $model->id, 'options' => ['class' => 'pjax-block']]);
            //$goodsInCart = \Yii::$app->cart->getPositions() ?>
            <?php
            if ($model->active){
                if (\Yii::$app->cart->getPositionById($model->id)){
                    echo Html::a('Вже у кошику' , ['cart/add', 'id' => $model->id],['class' => 'btn btn-success', 'style' => 'background:green; border-color:green;']);
                }
                else
                {
                    echo Html::a('Додати до кошика' , ['cart/add', 'id' => $model->id],['class' => 'btn btn-primary', 'style' => 'background:#990099; border-color:#990099;']);
                }
            }
            else echo Html::button('Недоступно' ,['class' => 'btn btn-disabled disabled', 'style' => 'color:red; font-weight:bold;']);
            ?>
            <?php Pjax::end();?>
        </div>
    </div>
</div>