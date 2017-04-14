<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SocietyCorner */

$this->title = 'Create Society Corner';
$this->params['breadcrumbs'][] = ['label' => 'Society Corners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="society-corner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
