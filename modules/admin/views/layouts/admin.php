<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAdminAsset;
AppAdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="fixed">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Head Libs -->
		<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/modernizr/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/jquery-2.1.1.min.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
     <link rel="shortcut icon" href="<?php echo Yii::getAlias('@web').'/web/assets/admin/'?>icon/fav.ico" type="image/x-icon"/>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php 
$session = Yii::$app->session;

if(!isset($session['administrator'])){
	return Yii::$app->getResponse()->redirect(array('admin/administrator/login',));
}else if($session['administrator']==''){
	return Yii::$app->getResponse()->redirect(array('admin/administrator/login',));
}
?>
<section class="body">
<!-- header start -->

<header class="header">
				<div class="logo-container">
					<a href="../admin/dashboard.php" class="logo">
						<img height="45" width="150" alt="Dalmia" src="<?php echo Yii::getAlias('@web').'/web/assets/admin/'?>icon/logo_new.png">	
                       </a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>	
                        </div>
				</div>
				<!-- start: search & user box -->
				<div class="header-right">
					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo Yii::getAlias('@web').'/web/assets/admin/'?>/images/!logged-user.png" alt="Admin" class="img-circle" data-lock-picture="assets/images/!logged-user.png" />	
                   </figure>
					<div class="profile-info" data-lock-name="Administrator" data-lock-email="<?php echo 'ADMIN_EMAIL';?>">
								<span class="name"><?php echo $session['administrator']->name;?></span>
								<span class="role"></span></div>
					  <i class="fa custom-caret"></i></a>
					 <div class="dropdown-menu">
                      <ul class="list-unstyled">
                        <li class="test"><?php echo $session['administrator']->email;?></li>
                        <li><a role="menuitem" tabindex="-1" href="<?php echo  Yii::$app->request->baseUrl;?>/admin/administrator/editprofile?id=1"><i class="fa fa-user"></i>  Profile</a></li>
                        <!--<li><a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a></li>-->
                        <li><a role="menuitem" tabindex="-1" href="<?php echo  Yii::$app->request->baseUrl;?>/admin/administrator/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                      </ul>
				     </div>
				  </div>
				</div>
				<!-- end: search & user box -->
		  </header>
<!-- Header END -->
<div class="inner-wrapper">
<!-- left menu start -->
            <aside id="sidebar-left" class="sidebar-left">
             <div class="sidebar-header">
              <div class="sidebar-title">
                Navigation
              </div>
             <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
             </div>
            </div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active " <?php if(strstr($_SERVER['REQUEST_URI'],"admin")){ ?>class="active"<?php }?>>
										<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin">
										  <i class="fa fa-dashboard" aria-hidden="true"></i>
										  <span>Dashboard</span>										
                                        </a>	
                                       </li>
						    
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"cms")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    <span>CMS Pages</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"pages")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/cms">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Page Content </a> 
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"resource")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/cms/resource">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Resource</a>
                                    </li>
                                    </ul>
                                    </li>
                                        
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"notice")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <span>Notice Management</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"notice/index" || $_SERVER['REQUEST_URI'],"notice")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/notice">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Notice Content </a> 
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"notice/resource")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/notice/resource">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Notice Resource</a>
                                    </li>
                                    </ul>
                                    </li>
                                    
                                    
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"tender")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    <span>Tender Management</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"tender/index" || $_SERVER['REQUEST_URI'],"tender")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/tender">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Tender Content </a> 
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"notice/resource")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/tender/resource">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Tender Resource</a>
                                    </li>
                                    </ul>
                                    </li>
                                   
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"report")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    <span>Report Management</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"report/index" || $_SERVER['REQUEST_URI'],"report")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/report">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Report Content </a> 
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"report/resource")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/report/resource">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Report Resource</a>
                                    </li>
                                    </ul>
                                    </li>
                                    
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"otherreport")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    <span>Other Report Management</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"otherreport/index" || $_SERVER['REQUEST_URI'],"otherreport")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/otherreport">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Other Report Content </a> 
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"otherreport/resource")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/otherreport/resource">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Other Report Resource</a>
                                    </li>
                                    </ul>
                                    </li>
                                   
                                     <li <?php if(strstr($_SERVER['REQUEST_URI'],"events")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                                    <span>Event Management</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"events/index" || $_SERVER['REQUEST_URI'],"notice")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/events">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Event Content </a> 
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"events/resource")){ ?>class="nav-active"<?php }?>>
                                    <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/events/resource">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Event Resource</a>
                                    </li>
                                    </ul>
                                    </li>
                                    
                                        
                                        <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/photogallery">
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        <span>Photo Gallery</span>										
                                        </a>		
                                        </li>
                                        <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/slider">
                                        <i class="fa fa-sliders" aria-hidden="true"></i>
                                        <span>Home Slider</span>										
                                        </a>		
                                        </li>
                                        <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/awards">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span>Awards</span>										
                                        </a>		
                                        </li>
                                        <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/societycorner">
                                        <i class="fa fa-share-square-o" aria-hidden="true"></i>
                                        <span>Society Corner</span>										
                                        </a>		
                                        </li>
                                        
                                        <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/districtemail">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <span>District Email</span>										
                                        </a>		
                                        </li>
                                        
                                         <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/siteuser">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Website User</span>										
                                        </a>		
                                        </li>
                                        
                                        <li class="nav-active">
                                        <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/contact">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span>Contact-Us Reports</span>										
                                        </a>		
                                        </li>
                                        
                                    <!--  
                                    
                 <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_quote_category.php") || strstr($_SERVER['REQUEST_URI'],"all_quote_images.php")
				                  || strstr($_SERVER['REQUEST_URI'],"all_quote.php")){ ?>
                                    class="nav-parent nav-expanded nav-active"
                                    <?php 
                                    } else
                                    { ?>
                                    class="nav-parent"
                                    <?php }
                                    ?>>
                                    <a>
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                    <span>Quote Management</span>										</a>
                                    <ul class="nav nav-children">
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_quote_images.php")){ ?>class="nav-active"<?php }?>>
                                    <a href="all_quote_images.php">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Picture</a>
                                    </li>
                                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_quote.php")){ ?>class="nav-active"<?php }?>>
                                    <a href="all_quote.php">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Thoughts</a>
                                    </li>
                                    </ul>
                                    </li>
                                    
                                        <li class="nav-active">
                                        <a href="all_video.php">
                                        <i class="fa fa-youtube" aria-hidden="true"></i>
                                        <span>Video Management</span>										
                                        </a>		
                                        </li>
                                        
                                        <li class="nav-active">
                                        <a href="all_blog_content.php">
                                        <i class="fa fa-th-large" aria-hidden="true"></i>
                                        <span>Content Management</span>										
                                        </a>		
                                        </li>
                                    
                                        <li class="nav-active">
                                        <a href="all_comment.php">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                        <span>Comment Management</span>										
                                        </a>		
                                        </li>
                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_question.php") || strstr($_SERVER['REQUEST_URI'],"all_answer.php")){  ?>
                    class="nav-parent nav-expanded nav-active"
                    <?php 
                    } else
                    { ?>
                    class="nav-parent"
                    <?php }
                    ?>>
                    <a>
                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                    <span>Forum Management</span>										</a>
                    <ul class="nav nav-children">
                    <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_forum_question.php")){ ?>class="nav-active"<?php }?>>
                    <a href="all_forum_question.php">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>Question</a>
                    </li>
                    
                   <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_forum_answer.php")){ ?>class="nav-active"<?php }?>>
                    <a href="all_forum_answer.php">
                    <i class="fa fa-circle-o" aria-hidden="true"></i>Answer</a>
                    </li>
                    </ul>
                    </li>
                                    
                                                               
                                    
   <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_blog_category.php") || strstr($_SERVER['REQUEST_URI'],"all_blogs.php") || strstr($_SERVER['REQUEST_URI'],"all_small_blog.php")|| strstr($_SERVER['REQUEST_URI'],"all_latest_news.php") || strstr($_SERVER['REQUEST_URI'],"all_success_story.php") || strstr($_SERVER['REQUEST_URI'],"all_sales_presenter.php") || strstr($_SERVER['REQUEST_URI'],"all_sales_presenter_image.php") || strstr($_SERVER['REQUEST_URI'],"all_sales_product.php") || strstr($_SERVER['REQUEST_URI'],"all_sales_order.php")){  ?>
                        class="nav-parent nav-expanded nav-active"
						<?php 
						} else
						{ ?>
                        class="nav-parent"
                        <?php }
						?>>
        <a>
        <i class="fa fa-th" aria-hidden="true"></i>
        <span>Blog Management</span>
        </a>
    <ul class="nav nav-children">
        <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_blog_category.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_blog_category.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Category</a> 
                </li>
        <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_blogs.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_blogs.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Blogs</a>
        </li>
        
        <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_small_blog.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_small_blog.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Small Blogs</a>
        </li>
        <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_latest_news.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_latest_news.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Latest Industry News</a>
        </li>
        <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_success_story.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_success_story.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Sucess Story</a>
        </li>
          <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_sales_presenter.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_sales_presenter.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Sales Presenter</a>
        </li>
        
         <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_sales_presenter_image.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_sales_presenter_image.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Sales Presenter Gallery</a>
        </li>
         <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_sales_product.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_sales_product.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Sales Product</a>
        </li>
        
        <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_sales_order.php")){ ?>class="nav-active"<?php }?>>
            <a href="all_sales_order.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>Sales Order</a>
        </li>
    </ul>
</li>
                                    
                                    
                                    
                                                
          <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_faq_type.php") || strstr($_SERVER['REQUEST_URI'],"all_faq_topic.php") || strstr($_SERVER['REQUEST_URI'],"all_faq.php")){  ?>
                        class="nav-parent nav-expanded nav-active"
						<?php 
						} else
						{ ?>
                        class="nav-parent"
                        <?php }
						?>>
										<a>
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											<span>FAQ Management</span>										</a>
										<ul class="nav nav-children">
											<li <?php if(strstr($_SERVER['REQUEST_URI'],"all_faq_type.php")){ ?>class="nav-active"<?php }?>>
												<a href="all_faq_type.php">
													<i class="fa fa-list-alt" aria-hidden="true"></i>FAQ/Type </a> 
                                                    </li>
											<li <?php if(strstr($_SERVER['REQUEST_URI'],"all_faq_topic.php")){ ?>class="nav-active"<?php }?>>
												<a href="all_faq_topic.php">
													<i class="fa fa-list-alt" aria-hidden="true"></i>FAQ/Topic</a>
											</li>
                                            <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_faq.php")){ ?>class="nav-active"<?php }?>>
												<a href="all_faq.php">
													<i class="fa fa-list-alt" aria-hidden="true"></i>FAQ</a>
											</li>
                                             <li <?php if(strstr($_SERVER['REQUEST_URI'],"all_keyword.php")){ ?>class="nav-active"<?php }?>>
												<a href="all_keyword.php">
													<i class="fa fa-list-alt" aria-hidden="true"></i>FAQ Key Words</a>
											</li>
										</ul>
									</li>             
                                            
                                        <li class="nav-active">
                                        <a href="all_ads.php">
                                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                                        <span>Advertisement Management</span>										
                                        </a>		
                                        </li>
                                                                            
                                        <li class="nav-active">
                                        <a href="all_member.php">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Member's Management</span>										
                                        </a>		
                                        </li>
                                        
                                        <li class="nav-active">
                                        <a href="all_social_media_report.php">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <span>Social Media Management</span>										
                                        </a>		
                                        </li>
                                        
                                        <li class="nav-active">
                                        <a href="all_contactform_report.php">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span>Contact-Us Management</span>										
                                        </a>		
                                        </li>
                                        
                                        
                                       
                                        <li class="nav-active">
                                        <a href="all_receiver_email.php">
                                        <i class="fa fa-share" aria-hidden="true"></i>
                                        <span>Email-Id Management</span>										
                                        </a>		
                                        </li>
                                    -->
						       </div>
					          </div>
			                 </aside>
<!-- left menu end -->

<?= $content ?>

</div>
</section>
<?php $this->endBody() ?>
</body>

<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Specific Page Vendor -->
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/select2/select2.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/theme.js"></script>
<!-- Theme Custom -->
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/theme.custom.js"></script>
<!-- Theme Initialization Files -->
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/theme.init.js"></script>
<!-- Examples -->
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/tables/examples.datatables.default.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/tables/examples.datatables.row.with.details.js"></script>
<script src="<?php echo Yii::getAlias('@web').'/web/assets/admin'?>/javascripts/tables/examples.datatables.tabletools.js"></script>

</html>
<?php $this->endPage() ?>
