<div class="col-lg-8 col-md-8 col-sm-8 pdf-download">
        <div class="courseArchive_content">
          <div class="single_course_content">
            <h2>Notice</h2>
            <div class="accordion archive-accordion" id="accordion2">
            <?php foreach ($model as $value) { 
            if($value->archive==0){
            	?>
            	<div class="accordion-group">
                <div class="accordion-heading "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $value->notice_id;?>" href="#collapse<?php echo $value->notice_id;?>"> <?php echo $value->notice_title;?> </a> </div>
                <div id="collapse<?php echo $value->notice_id;?>" class="accordion-body collapse">
                  <div class="accordion-inner clearfix">
                    <?php echo html_entity_decode($value->notice_content);?>
                     <?php 
                    if($value->noticeResources) { ?>                      
                    	<p> 
                    	<?php foreach ($value->noticeResources as $pdfvalue) {
                    		
                    		?>
                    		<a class=" btn btn-info pull-right" href="<?php echo Yii::getAlias('@web').'/uploads/notice/'.$pdfvalue->filename;?>" target="_blank"><?php echo $pdfvalue->resourece_title;?></a>
                    <?php	}?>
                    	 </p>
                   <?php  } ?>
                  </div>
                </div>
              </div>
           <?php  } }?>
          </div>
             
             <div class="archive">
            <h2 class="archive-heading">Archive</h2>
            <div class="accordion archive-accordion" id="accordion3">
            <?php foreach ($model as $value) { 
            if($value->archive==1){
            	?>
            	<div class="accordion-group">
                <div class="accordion-heading "> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $value->notice_id;?>" href="#collapse<?php echo $value->notice_id;?>"> <?php echo $value->notice_title;?> </a> </div>
                <div id="collapse<?php echo $value->notice_id;?>" class="accordion-body collapse">
                  <div class="accordion-inner clearfix">
                    <?php echo html_entity_decode($value->notice_content);?>
                     <?php 
                    if($value->noticeResources) { ?>                      
                    	<p> 
                    	<?php foreach ($value->noticeResources as $pdfvalue) {
                    		
                    		?>
                    		<a class=" btn btn-info pull-right" href="<?php echo Yii::getAlias('@web').'/uploads/notice/'.$pdfvalue->filename;?>" target="_blank"><?php echo $pdfvalue->resourece_title;?></a>
                    <?php	}?>
                    	 </p>
                   <?php  } ?>
                    
                  </div>
                </div>
              </div>
           <?php  } }?>
          </div>
          </div>
        </div>
      </div>
      </div>