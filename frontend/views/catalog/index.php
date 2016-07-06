<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\sidenav\SideNav;

/* @var $this yii\web\View */
$title = $category === null ? 'Весь каталог' : $category->title;
$this->title = Html::encode($title);

//$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12">
            <?= SideNav::widget([
                //'type' => SideNav::TYPE_SUCCESS,
                'encodeLabels' => false,
                'activateParents' => true,
                'activateItems' => true,
                'hideEmptyItems' => true,
                'indItem' => '<i class="glyphicon glyphicon-menu-right"></i>&nbsp;',
                'indMenuOpen' => '<i class="glyphicon glyphicon-circle-arrow-down"></i>',
                'indMenuClose' => '<i class="glyphicon glyphicon-circle-arrow-right"></i>',
                'heading' => false,
                'items' => $menuItems,
            ])?>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12">
            <?php //Html::encode($title) ?>

            <?= ListView::widget([
                'dataProvider' => $goodsDataProvider,
                'itemView' => '_goods',
                'layout' => '{pager}{items}<div style="clear: both;"></div>{pager}',
            ]) ?>
        </div>
    </div>
</div>

<?php $this->registerJs(
    'jQuery(document).on("pjax:end", ".pjax-block", function(){
        var itemsCounter = jQuery("#itemsincart");
        var costCounter = jQuery("#totalprice");
        
        itemsCounter.text(parseInt(itemsCounter.text()) + 1);
        //costCounter.text('.Yii::$app->cart->getCost().'); 
    });'
);?>