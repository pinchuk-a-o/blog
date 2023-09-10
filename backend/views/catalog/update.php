<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Catalog $model */

$this->title = 'Редактировать каталог: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталоги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
