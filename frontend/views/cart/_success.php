<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
//use yii\widgets\ActiveForm;
//<div class="glyphicon glyphicon-shopping-cart"></div>
?>
<?php /** @var $model \common\models\Goods */ ?>
    <?php Pjax::begin(['id' => 'pjax_' . $model->id, 'options' => ['class' => 'pjax-block']]);?>
        <?=Html::a('Вже у кошику' , ['cart/add', 'id' => $id],['class' => 'btn btn-success', 'style' => 'background:green; border-color:green;']);?>
    <?php Pjax::end();?>