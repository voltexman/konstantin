<?php

/* @var $this yii\web\View */
/* @var $category \backend\models\Category */

$this->title = 'Изменить категорию: ' . $category->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->name, 'url' => ['view', 'id' => $category->id]];
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $category,
    ]) ?>

</div>