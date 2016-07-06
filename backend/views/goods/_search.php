<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'ucat_id') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'fas') ?>

    <?php // echo $form->field($model, 'izmer') ?>

    <?php // echo $form->field($model, 'bonus') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'novelty') ?>

    <?php // echo $form->field($model, 'offer') ?>

    <?php // echo $form->field($model, 'seed_group') ?>

    <?php // echo $form->field($model, 'eav') ?>

    <?php // echo $form->field($model, 'descript_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
