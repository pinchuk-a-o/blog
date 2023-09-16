<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $authors */
/** @var array $catalogs */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4"><?= $form->field($model, 'author_id')->dropDownList($authors) ?></div>
        <div class="col-lg-4"><?= $form->field($model, 'catalog_id')->dropDownList($catalogs) ?></div>
        <div class="col-lg-4"><?= $form->field($model, 'sort')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-lg-3"><?= $form->field($model, 'title_translit')->textInput(['readonly' => true]) ?></div>
        <div class="col-lg-3"><?= $form->field($model, 'is_published')->checkbox() ?></div>
    </div>

    <div class="row">
        <?= $form->field($model, 'short_text')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 300,
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'imagemanager',
                ],
                'imageUpload' => Url::to(['default/image-upload']),
                'imageManagerJson' => Url::to(['/default/images-get']),
            ],
        ]); ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'text')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 300,
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'imagemanager',
                ],
                'imageUpload' => Url::to(['default/image-upload']),
                'imageManagerJson' => Url::to(['/default/images-get']),
            ],
        ]); ?>
    </div>
    <hr>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Список', ['index'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
