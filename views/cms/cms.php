<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoticeResourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->page_title;
?>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="courseArchive_content"> 
          <div class="single_course_content">
          <?php echo html_entity_decode($model->page_content); ?>
           </div>
        </div>
      </div>