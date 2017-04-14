<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SocietyCorner */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Society Corners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="society-corner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->society_corner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->society_corner_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'society_corner_id',
            'title',
            'filename:ntext',
            'active',
            'created_date',
        ],
    ]) ?>

</div>
