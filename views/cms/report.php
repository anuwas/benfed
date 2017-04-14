<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportResourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
      <div class="col-lg-8 col-md-8 col-sm-8 pdf-download">
        <div class="courseArchive_content">
        
          <div class="single_course_content">
            <?php echo  html_entity_decode($model->page_content);?>
          </div>
          <!-- start related course --> 
         
          <!-- End related course --> 
        </div>
      </div>