<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $category \backend\models\Category */

$this->title = $category->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $category->id], ['class' => 'btn flat btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $category->id], [
            'class' => 'btn flat btn-danger',
            'data' => [
                'confirm' => 'Ви действительно хотите удалить этот елемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">

        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">Данные категории</div>
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $category,
                        'attributes' => [
                            [
                                'attribute' => 'id',
                            ],
                            [
                                'attribute' => 'name',
                            ],
                            [
                                'attribute' => 'text',
                            ],
                            [
                                'attribute' => 'title',
                            ],
                            [
                                'attribute' => 'description',
                            ],
                            [
                                'attribute' => 'keywords',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">Изображение</div>
                <div class="box-body">
                    <img class="img-responsive pad" src="<?= $category->getThumbFileUrl('image', 'admin'); ?>" alt="">
                </div>
            </div>
        </div>

    </div>
</div>