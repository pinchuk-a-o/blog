<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Article $model */
/** @var array $authors */
/** @var array $catalogs */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'authors' => $authors,
        'catalogs' => $catalogs,
    ]) ?>

</div>
