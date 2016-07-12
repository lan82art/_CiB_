<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Order */
/* @var $form ActiveForm */
?>
<div class="order">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'delivery') ?>
        <?= $form->field($model, 'amount') ?>
        <?= $form->field($model, 'notes') ?>
        <?= $form->field($model, 'inner_code') ?>
        <?= $form->field($model, 'coderword') ?>
        <?= $form->field($model, 'refuse') ?>
        <?= $form->field($model, 'status') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- order -->
