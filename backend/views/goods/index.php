<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [   'class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'headerOptions' => ['width' => '75'],
            ],

            'title',
            //'slug',
            [
                'attribute' => 'GoodsCategoryTitle',
                'label' => 'Категория',
                'format' =>  'text',
                'headerOptions' => ['width' => '200'],
            ],
            [
                'attribute' => 'cat_id',
                'label' => 'Каталог',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'ucat_id',
                'label' => 'Подкат.',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'code',
                'label' => 'Код',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'picture',
                'label' => 'Код пики',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'price',
                'label' => 'Цена',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'fas',
                'label' => 'Фасовка',
                'format' =>  'text',
                'headerOptions' => ['width' => '20'],
            ],
            [
                'attribute' => 'izmer',
                'label' => 'Ед. измер.',
                'format' =>  'text',
                'headerOptions' => ['width' => '20'],
            ],
            [
                'attribute' => 'bonus',
                'label' => 'Бонус',
                'format' =>  'text',
                'headerOptions' => ['width' => '20'],
            ],
            [
                'attribute' => 'active',
                'label' => 'Активно',
                'format' =>  'text',
                'headerOptions' => ['width' => '10'],
            ],
            [
                'attribute' => 'novelty',
                'label' => 'Новинка',
                'format' =>  'text',
                'headerOptions' => ['width' => '10'],
            ],
            [
                'attribute' => 'offer',
                'label' => 'Акция',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'seed_group',
                'label' => 'Группа семян',
                'format' =>  'text',
                'headerOptions' => ['width' => '15'],
            ],
            [
                'attribute' => 'eav',
                'label' => 'EAV',
                'format' =>  'text',
                'headerOptions' => ['width' => '10'],
            ],
            [
                'attribute' => 'descript_id',
                'label' => 'ID описания',
                'format' =>  'text',
                'headerOptions' => ['width' => '10'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
