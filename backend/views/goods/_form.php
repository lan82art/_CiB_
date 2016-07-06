<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\GoodsCategory;

/* @var $this yii\web\View */
/* @var $model common\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php  $form = ActiveForm::begin([
        'id' => 'form-goods',
        'type' => ActiveForm::TYPE_INLINE,
        'fieldConfig' => [
            'autoPlaceholder'=>true
        ],
        'options' => [
            'enableAjaxValidation' => true,
        ]
    ]); ?>

    <p>
        Название <?= $form->field($model, 'title')->textInput(['maxlength' => true,'style' => 'width:300px'])?>
        <?php //$form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        Категория <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(GoodsCategory::find()->orderBy('id,parent_id')->all(),'id','title','parentCategoryTitle'),['prompt'=>'Выберите категорию']) ?>
    </p>
    <p>
        <?= $form->field($model, 'cat_id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'ucat_id')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>
    </p>
    <p>
        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'fas')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'izmer')->textInput(['maxlength' => true]) ?>
    </p>
    <p>
        <?= $form->field($model, 'bonus')->textInput() ?>
        <?= $form->field($model, 'active')->textInput() ?>
        <?= $form->field($model, 'novelty')->textInput() ?>
        <?= $form->field($model, 'offer')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'seed_group')->textInput() ?>
    </p>
    <p>
        <?= $form->field($model, 'eav')->textInput() ?>
        <?= $form->field($model, 'descript_id')->textInput(['maxlength' => true]) ?>
    </p>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
