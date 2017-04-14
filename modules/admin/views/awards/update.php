<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Awards */

$this->title = 'Update Awards: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->award_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="awards-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
