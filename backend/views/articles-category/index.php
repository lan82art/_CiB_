<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Articles Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'parent_id',
            'title',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
