<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Goods */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'cat_id' => $model->cat_id, 'ucat_id' => $model->ucat_id, 'code' => $model->code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'cat_id' => $model->cat_id, 'ucat_id' => $model->ucat_id, 'code' => $model->code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'slug',
            'category_id',
            'cat_id',
            'ucat_id',
            'code',
            'picture',
            'price',
            'fas',
            'izmer',
            'bonus',
            'active',
            'novelty',
            'offer',
            'seed_group',
            'eav',
            'descript_id',
        ],
    ]) ?>

</div>
