<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GoodsCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать товарную категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'autoXlFormat'=>true,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'format' =>  'text',
                'headerOptions' => ['width' => '20'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
            ],
            [
                'attribute' => 'parentcategorytitle',
                'label' => 'Родительская категория',
                'format' =>  'text',
                'headerOptions' => ['width' => '350'],
            ],
            'title',
            [
                'attribute' => 'slug',
                'format' =>  'text',
                'headerOptions' => ['width' => '50'],
            ],
            [
                'attribute' => 'status',

            ]

        ],
    ]); ?>
</div>
