<div class="col-lg-8 col-md-8 col-sm-8">
      <div class="courseArchive_content"> 
       
        <div class="single_course_content otr-rprt">
          <h2>Other Reports</h2>
          
           <?php foreach ($model as $value) { ?>
		   
          
           
          <div class="col-md-6">
          <div class="each-report">
            <?php echo $value->page_content;?>
           <?php if(isset($value->otherreportResources)){
           	foreach ($value->otherreportResources as $pvalue) {
           	
           	?>
            <p><a href="<?php echo Yii::getAlias('@web').'/uploads/otherreport/'.$pvalue->filename;?>"> <i class="fa fa-download" aria-hidden="true"></i> <?php echo $value->title;?> </a></p>
            <?php } } ?>
            </div>
          </div>
          <?php } ?>
           
        
        </div>
      </div>
      </div>