<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ArticlesCategory;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
//use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'art_cat_id')->dropDownList(ArrayHelper::map(ArticlesCategory::find()->all(),'id','title'),['prompt'=>'Выберите категорию']) ?>

    <?= $form->field($model, 'is_news')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article')->widget(CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'full',
        'clientOptions' => [
            'language' => 'uk_UA',

        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
