<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiteUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siteuser_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siteuser_email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'siteuser_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
