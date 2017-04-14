<div class="col-lg-8 col-md-8 col-sm-8">
        <div class="courseArchive_content"> 
         
          <div class="single_course_content hlp-society">
        <h3>Kaliachak Large-Sized Co-Operative Marketing Society Ltd.</h3>
          
          <?php foreach ($model as $values) {?>
          <div class="col-md-4"> <a class="" data-toggle="modal" data-target="#myModal<?php echo $values->society_corner_id;?>"><img class="img-responsive" src="<?php echo Yii::getAlias('@web').'/uploads/societycorner/'.$values->filename;?>"> </a> 
              
              <!-- Modal -->
              <div class="modal fade" id="myModal<?php echo $values->society_corner_id;?>" role="dialog">
                <div class="modal-dialog"> 
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <p><img class="img-responsive" src="<?php echo Yii::getAlias('@web').'/uploads/societycorner/'.$values->filename;?>"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

          </div>
          <!-- start related course --> 
          
          <!-- End related course --> 
        </div>
      </div>