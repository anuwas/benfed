<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'page_content') ?>

    <?= $form->field($model, 'content_snippet') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
