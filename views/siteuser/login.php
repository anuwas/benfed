<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>
<section id="contact">
      <div class="container">
       <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input required="true" class="form-control" id="siteuser-siteuser_email" placeholder="E-mail" name="SiteUser[siteuser_email]" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input required="true" class="form-control" id="siteuser-siteuser_password" placeholder="Password" name="SiteUser[siteuser_password]" type="password" value="">
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form 
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                                <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->