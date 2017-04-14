<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SiteUser */

$this->title = 'Update District Email: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'District Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->districtemail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
