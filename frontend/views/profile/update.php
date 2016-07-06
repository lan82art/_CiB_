<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\ProfileUpdateForm */


use yii\helpers\Html;
use kartik\form\ActiveForm;
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
            <div class="row">
            <!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php //$form->field($model, 'username') ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'email']) ?>
                <?php// $form->field($model, 'password')->passwordInput() ?>
                <?php// $form->field($model, 'repeatpass')->passwordInput() ?>

                <?php /* $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) */
                  //$form->field($model, 'allow_to_save')->checkbox() ?>
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php // $form->field($model, 'in_code')->label()?>
                <?php // $form->field($model, 'surname')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Фамилия']) ?>
                <?php // $form->field($model, 'name')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Имя']) ?>
                <?php // $form->field($model, 'patronymic')->widget(MaskedInput::className(), ['mask' => 'Aa{1,50}'])->textInput(['placeholder' => 'Отчество']) ?>
                <?php // $form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => '+38(999)999-99-99'])->textInput() ?>
                <?php // $form->field($model, 'post_index')->widget(MaskedInput::className(), ['mask' => '99999'])->textInput() ?>
                <?php // $form->field($model, 'address')->textarea(['rows'=> '4'])?>
            </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Обновить данные', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
