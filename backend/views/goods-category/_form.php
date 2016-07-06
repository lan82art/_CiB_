<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\GoodsCategory;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map(GoodsCategory::find()->orderBy('id,parent_id')->all(),'id','title','parentCategoryTitle'),['prompt'=>'Выберите категорию']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
