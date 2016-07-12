<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\sidenav\SideNav;
//use kartik\sidenav\SideNavAsset;
//use yii\helpers\Url;

/* @var $this yii\web\View */
//$title = $category === null ? 'Статьи' : $category->title;
$this->title = Html::encode($title);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12">
            <?= SideNav::widget([
                //'type' => SideNav::TYPE_SUCCESS,
                'encodeLabels' => true,
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
            <?= Html::encode($title) ?>
            <?= ListView::widget([
                'dataProvider' => $articlesDataProvider,
                'layout' => '{pager}{items}{pager}',
                'itemView' => '_article',
            ]) ?>
        </div>
    </div>
</div>