<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoGallerySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'districtemail_id') ?>

    <?= $form->field($model, 'district_name') ?>

    <?= $form->field($model, 'district_email') ?>

    <?= $form->field($model, 'add_on') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
