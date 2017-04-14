<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Awards */

$this->title = 'Create Awards';
$this->params['breadcrumbs'][] = ['label' => 'Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="awards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
