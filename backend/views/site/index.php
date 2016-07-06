<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'DashBoard';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                &nbsp;
            </div>
        </div>

        <div class="row" style="text-align: center;">
            <div class="col-lg-4">
                <h3>Articles</h3>
                <?= Html::a('<span class="glyphicon glyphicon-book" style="font-size:8em; text-decoration:none;"/></span>', ['articles/index']);?>
            </div>
            <div class="col-lg-4">
                <h3>Articles category</h3>
                <?= Html::a('<span class="glyphicon glyphicon-pencil" style="font-size:8em; text-decoration:none;"/></span>', ['articles-category/index']);?>
            </div>
            <div class="col-lg-4">
                <h3>Goods</h3>
                <?= Html::a('<span class="glyphicon glyphicon-leaf" style="font-size:8em; text-decoration:none;"/></span>', ['goods/index']);?>
            </div>
            <div class="col-lg-4">
                <h3>Goods Category</h3>
                <?= Html::a('<span class="glyphicon glyphicon-leaf" style="font-size:8em; text-decoration:none;"/></span>', ['goods-category/index']);?>
            </div>
            <div class="col-lg-4">
                <h3>Users</h3>
                <?= Html::a('<span class="glyphicon glyphicon-user" style="font-size:8em; text-decoration:none;"/></span>', ['articles/index']);?>
            </div>
            <div class="col-lg-4">
                <h3>Orders</h3>
                <?= Html::a('<span class="glyphicon glyphicon-shopping-cart" style="font-size:8em; text-decoration:none;"/></span>', ['order/index']);?>
            </div>
            <div class="col-lg-4">
                <h3>Something else</h3>
                <?= Html::a('<span class="glyphicon glyphicon-book" style="font-size:8em; text-decoration:none;"/></span>', ['articles/index']);?>
            </div>
        </div>
    </div>
</div>
