<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsDelivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ucat_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finish_date')->textInput() ?>

    <?= $form->field($model, 'delivery_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
