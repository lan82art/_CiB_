<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\ProfileUpdateForm */

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
//use yii\captcha\Captcha;
use yii\widgets\MaskedInput;

$this->title = 'Редактирование профиля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php $form = ActiveForm::begin([
                'id' => 'form-userupdate',
                'fieldConfig' => [
                    'autoPlaceholder'=>true
                ],
                'options' => [
                    'enableAjaxValidation' => true,
                ]
            ]);
            ?>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?=$form->field($model, 'email')?>
                <?=$form->field($model, 'in_code')->textInput(['placeholder' => 'Внутренний код'])?>
                <?=$form->field($model, 'surname')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Фамилия']) ?>
                <?=$form->field($model, 'name')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Имя']) ?>
                <?=$form->field($model, 'patronymic')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Отчество']) ?>
                <?=$form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => '+38(999)999-99-99'])->textInput() ?>
                <?=$form->field($model, 'birthday')->widget(DatePicker::classname(), [
                    'language' => 'ru',
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',]
                ]) ?>
                <?=$form->field($model, 'post_index')->widget(MaskedInput::className(), ['mask' => '99999'])->textInput() ?>
                <?=$form->field($model, 'address')->textarea(['rows'=> '4'])?>
            </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Обновить данные', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
