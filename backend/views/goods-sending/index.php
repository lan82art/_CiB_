<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GoodsDeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods Deliveries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Создать отправку товара', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cat_id',
            'ucat_id',
            'title',
            'finish_date',
            'delivery_text',
            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
