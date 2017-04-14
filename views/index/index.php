<?php
/* @var $this yii\web\View */
?>
<section id="slider">
  <div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="slider_area">
      <section class="col-xs-12">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="clearfix">
              <div class="slide wow fadeInUp slidedot">
                <div class="latest-posts-classic custom-carousel slider-carousel" data-appeared-items="5">
                <?php foreach ($slider as $values){?>
                <div class="col-md-12 item">
                    <div class="block block-1"> <img class="img-responsive" src="<?php echo Yii::getAlias('@web').'/uploads/'?>slider/<?php echo $values->filename;?>" alt="crs1">
                      <h4><?php echo $values->title;?></h4>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
              
              <!-- /item --> 
            </div>
            <!-- /thumbcarousel --> 
          </div>
          <!-- /clearfix --> 
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Welcome</h4>
      </div>
      <div class="modal-body"> About Me-<br>
        <a href="http://webdevron.com">@ My website</a><br>
        <a href="http://fb.com/webdevron">@ facebook</a><br>
        <a href="http://fb.com/webdevrony">@ twitter</a><br>
        <a href="https://www.linkedin.com/in/webdevron">@ linkedin</a><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<section id="aboutUs">
  <div class="container">
    <div class="row"> 
      <!-- Start about us area -->
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="aboutus_area wow fadeInLeft wow fadeInUp">
          <?php echo html_entity_decode($welcome->content_snippet);?>
          
          </div>
      </div>
	  
	  <div class="col-lg-2 col-md-12 col-sm-12 paddy-procurement">
	 
	  <a href="template-for-submission-off-paddy-procurement-infomration-by-SKUS.xlsx">
	  Template For Submission Of Paddy Procurement
	  </a>
	 
	  </div>
	  
      <div class="col-lg-4 col-md-12 col-sm-12 ">
<!--         <div class="single_sidebar">
  <div class="panel panel-default wow fadeInUp">
    <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b>Notice Board</b></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-xs-12">
          <ul class="demo">
		 <li class="news-item">
                <table cellpadding="4">
                  <tr>
                    <td>Guidelines for making payment to farmers for Paddy Procured ... <br />
                      <a class="text-warning pull-right" href="notice.html">[Read more]</a></td>
                  </tr>
                </table>
              </li>
			<li class="news-item">
                <table cellpadding="4">
                  <tr>
                    <td>Shifting of BENFED Howrah Branch Office ... <br />
                      <a class="text-warning pull-right" href="notice.html">[Read more]</a></td>
                  </tr>
                </table>
              </li>
			   <li class="news-item">
                <table cellpadding="4">
                  <tr>
                    <td>Quotation for Photocopier Machine on Monthly Rental Basis ... <br />
                      <a class="text-warning pull-right" href="notice.html">[Read more]</a></td>
                  </tr>
                </table>
              </li>						  
              <li class="news-item">
                <table cellpadding="4">
                  <tr>
                    <td> EOI for Operation & Maintenance Contract of Memari Himghar, Burdwan ... <br />
                      <a class="text-warning pull-right" href="notice.html">[Read more]</a></td>
                  </tr>
                </table>
              </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel-footer"> </div>
  </div>
</div> -->
<?php echo \app\components\NoticeBoardwidget::widget() ?>
 
      </div>
    </div>
  </div>
</section>
<section id="whyUs">
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <div class="whyus_top">
        <div class="container"> 
          
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="single_whyus_top wow fadeInUp"> 
                <!--<div class="whyus_icon">
                      <span class="fa fa-desktop"></span>
                    </div>-->
                <h3><?php echo $marketing->page_title;?></h3>
                <p><?php echo html_entity_decode($marketing->content_snippet);?></p>
               <a href="<?php echo  Yii::$app->request->baseUrl;?>/marketing-procurement" class=" btn btn-default text-center" > Read More </a> </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="single_whyus_top wow fadeInDown"> 
                <!--<div class="whyus_icon">
                      <span class="fa fa-users"></span>
                    </div>-->
                <h3><?php echo $engineering->page_title;?></h3>
                <p><?php echo html_entity_decode($engineering->content_snippet);?></p>
               <a href="<?php echo  Yii::$app->request->baseUrl;?>/fertilizer" class=" btn btn-default text-center" > Read More </a> </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="single_whyus_top wow fadeInUp"> 
                <h3><?php echo $fertilizer->page_title;?></h3>
                <p><?php echo html_entity_decode($fertilizer->content_snippet);?></p>
                <a href="<?php echo  Yii::$app->request->baseUrl;?>/engineering" class=" btn btn-default text-center" > Read More </a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="events">
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="title_area">
              <h2 class="title_two">Events</h2>
            </div>
            <div class="container">
              <div class="row">
                <div class='col-md-offset-2 col-md-8 text-center'> 
                  <!--<h2>Responsive Quote Carousel BS3</h2>--> 
                </div>
              </div>
              <div class="carousel slide" data-ride="carousel" id="quote-carousel"> 
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#quote-carousel" data-slide-to="1"></li>
                  <li data-target="#quote-carousel" data-slide-to="2"></li>
                </ol>
                
                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner"> 
                  <?php 
                  $i=0;
                  foreach ($events as $values){ ?>
                  <div class="item <?php if($i==0){?>active <?php } ?>">
                    <blockquote>
                      <div class="row">
                        <?php echo html_entity_decode($values->content_snippet) ;?>
                      </div>
                    </blockquote>
                  </div>
                  <?php $i++; } ?>
				
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="paddy" class="wow fadeInDown animated">
  <div class="row clearfix">
    <div class="col-lg-12 col-sm-12 ">
      <div class="container">
        <div class="row ">
          <div class="col-lg-12 col-md-12">
            <div class="title_area">
              <h2 class="title_two">Photo Gallery</h2>
            </div>
            <div class="container">
              <div class="row">
                <div class='col-md-12 text-center'> 
                  
					
					<div id="team-section" class="touch-carousel">
          
                  <div class="slide">
                    <div class="latest-posts-classic custom-carousel touch-carousel1" data-appeared-items="4">
                    <?php foreach ($photogallery as $values){?>
                    <div class="col-md-12 item">
                        <div class="text-center paddy-img"> <a href="#" data-toggle="modal" data-target="#paddy1"> <img src="<?php echo Yii::getAlias('@web').'/uploads/'?>photogallery/<?php echo $values->filename;?>" alt="1"> </a> 
											
						</div>
                      </div>
                    <?php } ?>
					  
                    </div>
									
                  </div>
                  
               
          </div>
          <!-- /row --> 
        </div>	
				  				  
                </div>
              </div>
             			  
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section id="awarded" class="wow fadeInDown">
  <div class="container"> 
  
  <div class="col_half nobottommargin">
    <!-- Our courses titile -->
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="title_area">
          <h2 class="title_two">Achievement & Awards </h2>
        </div>
      </div>
    </div>
    <!-- End Our courses titile --> 
    
    <!-- Start Our courses content -->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="team-section" class="touch-slider">
          <div class="container"> <!-- Container -->
            <div class="row">
              <div class="col-md-12">
                <div class="clearfix">
                  <div class="slide">
                    <div class="latest-posts-classic custom-carousel touch-carousel1" data-appeared-items="3">
                    <?php foreach ($awards as $value) { ?>
                    	<div class="col-md-12 item">
                        <div class="text-center award"> <a href="#" data-toggle="modal" data-target="#Award<?php echo $value->award_id;?>"> <img class="img-responsive" src="<?php echo Yii::getAlias('@web').'/uploads/'?>award/<?php echo $value->filename;?>" alt="client"> </a> 
						<h5 class="text-center"><?php echo $value->title;?></h5>	
											
						</div>
                      </div>
                  <?php   }?>
                      
                                        
                    </div>
									
                  </div>
                  
                  <!-- /item --> 
                </div>
                <!-- /thumbcarousel --> 
              </div>
              <!-- /clearfix --> 
            </div>
          </div>
          <!-- /row --> 
        </div>		
		
      </div>
    </div>
    <!-- End Our courses content --> 
  </div>
					
  </div>
</section>
<?php foreach ($awards as $value){?>
<div class="modal fade" id="Award<?php echo $value->award_id;?>" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $value->heading;?></h4>
        </div>
        <div class="modal-body clearfix">
		<div class="col-md-4 bg-warning"><img class="img-responsive" src="<?php echo Yii::getAlias('@web').'/uploads/'?>award/<?php echo $value->filename;?>"></div>
		<div class="col-md-8">
          <p><?php echo $value->description;?></p>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
