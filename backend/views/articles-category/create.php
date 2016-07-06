<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ArticlesCategory */

$this->title = 'Create Articles Category';
$this->params['breadcrumbs'][] = ['label' => 'Articles Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
