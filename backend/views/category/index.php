<?php

use backend\models\Product;
use nickdenry\grid\toggle\components\RoundSwitchColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn flat btn-success']) ?>
    </p>

    <div class="box box-solid">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'columns' => [
                    [
                        'attribute' => 'name',
                        'label' => 'Название',
                    ],
                    [
                        'label' => 'Товаров',
                        'headerOptions' => ['width' => 150],
                        'value' => function () {
                            return Product::find()->count() . ' шт.';
                        }
                    ],
                    [
                        'class' => RoundSwitchColumn::class,
                        'attribute' => 'status',
                        'action' => 'status-change', // by default 'toggle'
                        /* other column options, i.e. */
                        'headerOptions' => ['width' => 150],
                    ],
                    [
                        'class' => ActionColumn::class,
                        'header' => 'Действия',
                        'headerOptions' => ['width' => 100],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>