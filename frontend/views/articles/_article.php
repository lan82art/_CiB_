<?php
use yii\helpers\Html;
//use yii\helpers\Markdown;
?>
<?php /** @var $model \common\models\Articles */ ?>

<div class="col-xs-12">
    <div class="col-xs-12">
        <div class="row">
            <h2><?= Html::encode($model->art_title) ?></h2>
            <h4>Дата: <?= date("d.m.Y",$model->created_at) ?></h4>
            <div class="col-xs-12" style="border: 1px solid #6F2797; padding: 10px; margin-bottom: 10px;"><?= $model->article ?></div>
        </div>
    </div>
</div>