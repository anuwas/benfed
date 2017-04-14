<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppIndexAsset;

AppIndexAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="<?php echo Yii::getAlias('@web').'/web/assets/admin/'?>icon/fav.ico" type="image/x-icon"/>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web').'/web/assets/js/jquery-last-min.js';?>"></script>
    
</head>
<body>
<?php $this->beginBody() ?>
<!-- SCROLL TOP BUTTON --> 
<a class="scrollToTop" href="#"></a> 
<!-- END SCROLL TOP BUTTON --> 


<!--=========== BEGIN HEADER SECTION ================-->
<header id="header"> 
  <!-- BEGIN MENU -->
  <div class="menu_area">
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="top-head">
      <div class="container">
        <div class="pull-left">
          <ul class="toplinks">
            <li><a href="mailto:benfed@rediffmail.com" target="_top">info@benfed.org</a></li>
            <li> | </li>
            <li>+91 33 2441 4366/67</li>
          </ul>
        </div>
        <div class="pull-right nav">
          <ul class="login-srch-box">
          <?php 
		$session = Yii::$app->session;
		if(!isset($session['loggedUser'])){ ?>
		<li class="dropdown" id="menuLogin"><a href="<?php echo Yii::$app->homeUrl.'siteuser/login'?>" title="login" class="login">login</a></li> 
		<?php }else if($session['loggedUser']==''){ ?>
		<li class="dropdown" id="menuLogin"><a href="<?php echo Yii::$app->homeUrl.'siteuser/login'?>" title="login" class="login">login</a></li> 
		<?php } else { ?>
		<li class="dropdown" id="menuLogin"><a href="javascript:void(0)"><?php echo $session['loggedUser']['siteuser_name'];?></a>&nbsp;|&nbsp;<a href="<?php echo Yii::$app->homeUrl.'siteuser/logout'?>" title="login" class="login">logout</a></li> 
		<?php } ?>
            
            <li>
              <form>
                <input type="text" class="pull-left" name="search" placeholder="Search..">
                <button class="search"> <i class="fa fa-search" aria-hidden="true"></i> </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="logo" href="<?php echo Yii::getAlias('@web');?>"><img class="img-responsive" src="<?php echo Yii::getAlias('@web').'/web/assets/'?>images/logo.png" alt="logo"></a> </div>
      <!-- /.recent menu -->
		<?=Yii::$app->view->renderFile('@app/views/menu/menu.php'); ?>
      <!-- /.nav-collapse --> 
      
    </div>
  </nav>
</div>

  <!-- END MENU --> 
</header>

<?= $content ?>

<footer id="footer">
    <!-- Start footer top area -->
   <?=Yii::$app->view->renderFile('@app/views/menu/footer_menu.php'); ?>
</footer>

<?php $this->endBody() ?>

<script type="text/javascript">
    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 7,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
		
    });
	
	$(window).scroll(function() {
    if ($(".top-head").offset().top > 50) {
        $(".top-head").addClass("hidden");
    } else {
        $(".top-head").removeClass("hidden");
    }
	
	
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});



  $(document).on('show','.accordion', function (e) {
         //$('.accordion-heading i').toggleClass(' ');
         $(e.target).prev('.accordion-heading').addClass('accordion-opened');
    });
    
    $(document).on('hide','.accordion', function (e) {
        $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
        //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
    });



	
});
</script> 





<script type="text/javascript">
    $(function () {
        $(".demo").bootstrapNews({
            newsPerPage: 2,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
		
    });
	
	$(window).scroll(function() {
    if ($(".top-head").offset().top > 50) {
        $(".top-head").addClass("hidden");
    } else {
        $(".top-head").removeClass("hidden");
    }
	
	
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});



  $(document).on('show','.accordion', function (e) {
         //$('.accordion-heading i').toggleClass(' ');
         $(e.target).prev('.accordion-heading').addClass('accordion-opened');
    });
    
    $(document).on('hide','.accordion', function (e) {
        $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
        //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
    });



	
});
</script> 
</body>
</html>
<?php $this->endPage() ?>
