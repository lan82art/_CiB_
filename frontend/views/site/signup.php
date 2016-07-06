<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use kartik\form\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста заполните все необходимые поля для регистрации:</p>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'fieldConfig' => [
                    'autoPlaceholder'=>true
                ],
                'options' => [
                    'enableAjaxValidation' => true,
                ]
            ]);
            ?>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'repeatpass')->passwordInput() ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <?= $form->field($model, 'allow_to_save')->checkbox() ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'in_code') ?>
                <?= $form->field($model, 'surname')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Фамилия']) ?>
                <?= $form->field($model, 'name')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Имя']) ?>
                <?= $form->field($model, 'patronymic')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Отчество']) ?>
                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => '+38(999)999-99-99'])->textInput() ?>
                <?= $form->field($model, 'post_index')->widget(MaskedInput::className(), ['mask' => '99999'])->textInput() ?>
                <?= $form->field($model, 'address')->textarea(['rows'=> '4']) ?>
            </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'userupdate-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
