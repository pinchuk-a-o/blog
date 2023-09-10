<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Catalog $model */

$this->title = 'Добавление каталога';
$this->params['breadcrumbs'][] = ['label' => 'Каталоги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
