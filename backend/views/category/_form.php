<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">

        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">Данные категории</div>
                <div class="box-body">
                    <?= $form->field($model, 'name')->textInput() ?>

                    <?= $form->field($model, 'text')->textarea(['rows' => 10, 'style' => 'resize:none']) ?>

                    <?= $form->field($model, 'status')->dropDownList($model->statusList) ?>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">Изображение</div>
                <div class="box-body">
                    <?=
                    $form->field($model, 'image')->widget(FileInput::class, [
                        'options' => ['multiple' => false, 'accept' => 'image/*'],
                        'pluginOptions' => [
                            'browseLabel' => '',
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ]
                    ])->label(false);
                    ?>
                </div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">SEO</div>
                <div class="box-body">
                    <?= $form->field($model, 'title')->textInput() ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 5, 'style' => 'resize:none']) ?>

                    <?= $form->field($model, 'keywords')->textInput() ?>
                </div>
            </div>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn flat btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>