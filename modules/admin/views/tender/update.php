<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tender */

$this->title = 'Update Tender: ' . $model->tender_id;
$this->params['breadcrumbs'][] = ['label' => 'Tenders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tender_id, 'url' => ['view', 'id' => $model->tender_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
