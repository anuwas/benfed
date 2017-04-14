<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use sadovojav\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\SiteUser */
/* @var $form yii\widgets\ActiveForm */
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add Site User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Site User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					
					<!-- start: page -->
					<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/districtemail" class="btn btn-primary">List of User</a>
										</div>
                                        </div>
                                        
								</div>
					<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Add Site User</h2>
							</header>			
					<div class="row">
						
						<div class="col-md-12">
						<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class' => 'form-horizontal']]); ?>
	               
								<section class="panel">
									<input name="cid" type="hidden" value="">
									<div class="panel-body">
									
                                    
                                    
									<div class="form-group">
											<label class="col-sm-2 control-label">User Name<span class="required">*</span></label>
											<div class="col-sm-8">
											<input type="text" id="siteuser-siteuser_name" class="form-control" name="SiteUser[siteuser_name]" maxlength="200" aria-required="true" aria-invalid="true" value="<?php echo $model->siteuser_name;?>">
    
											</div>
										</div>
  							

										<div class="form-group">
											<label class="col-sm-2 control-label">User Email<span class="required">*</span></label>
											<div class="col-sm-8">
											<input type="text" id="siteuser-siteuser_email" class="form-control" name="SiteUser[siteuser_email]" maxlength="200" aria-required="true" aria-invalid="true" value="<?php echo $model->siteuser_email;?>">
    
											</div>
										</div>
                                        
                                        <div class="form-group">
											<label class="col-sm-2 control-label">User Password<span class="required">*</span></label>
											<div class="col-sm-8">
											<input type="password" id="siteuser-siteuser_password" class="form-control" name="SiteUser[siteuser_password]" maxlength="200" aria-required="true" aria-invalid="true" value="<?php echo $model->siteuser_password;?>">
    
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Status<span class="required">*</span></label>
											<div class="col-sm-10">
                                            
                                            <label class="radio-inline">
                                            <input type="radio" id="siteuser-status"  name="SiteUser[status]" value="1" checked="checked">Active
                                            </label>
                                            <label class="radio-inline">
                                            <input type="radio" id="siteuser-status"  name="SiteUser[status]"  value="0">Inactive
                                            </label>
											</div>
										</div>
										
										
                                       <div class="col-sm-9 col-sm-offset-2">
												<button class="btn btn-primary">Submit</button>
												<!-- <input name="submit" id="submit" value="Submit" type="submit" class="btn btn-primary"> -->
												
												<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/siteuser" class="btn btn-primary">Cancel</a>
											</div>
									</div>
									
								</section>
							<?php ActiveForm::end(); ?>
						</div>
						<!-- col-md-6 -->
						
					</div>
					<div class="row">
						
						
					</div>
					<!-- end: page -->
				</section>
					
					