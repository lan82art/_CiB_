<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form ActiveForm */
?>
<div class="order">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id') ?>

        <?= $form->field($model, 'delivery') ?>
        <?= $form->field($model, 'amount') ?>

        <?= $form->field($model, 'inner_code') ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- order -->
