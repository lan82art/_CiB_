<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">

    <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Редактировать профиль', ['update'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Изменить пароль', ['password-change'], ['class' => 'btn btn-primary']) ?>
        </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
            'in_code',
            'surname',
            'name',
            'patronymic',
            'phone',
            'address',
            'post_index',
            'birthday:date',
        ],
    ]) ?>

</div>