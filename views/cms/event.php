<?php

use yii\helpers\Html;

?>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="courseArchive_content"> 
                    <div class="single_course_content">
            <h2>Events</h2>
            
          
 <div class="panel-group" id="accordion">
 <?php 
 $i=0;
 foreach ($model as $value) { ?>
 	
   <div class="panel event-panel ">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $value->event_id;?>">
        <?php echo $value->title;?>
        <i class="fa fa-angle-double-down pull-right" aria-hidden="true"></i>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $value->event_id;?>" class="panel-collapse collapse <?php if($i==0){ ?>in<?php } ?>">
      <div class="panel-body">
             <?php echo  html_entity_decode($value->page_content);?>
      </div>
    </div>
  </div>
  <?php $i++; } ?>


</div>           </div>
        </div>
      </div>