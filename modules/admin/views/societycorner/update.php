<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SocietyCorner */

$this->title = 'Update Society Corner: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Society Corners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->society_corner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="society-corner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
