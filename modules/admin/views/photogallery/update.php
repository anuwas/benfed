<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoGallery */

$this->title = 'Update Photo Gallery: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Photo Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->photo_gallery_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
