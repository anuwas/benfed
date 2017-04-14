<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use sadovojav\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Notice */
/* @var $form yii\widgets\ActiveForm */
?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add Notice</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Notice</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					
					<!-- start: page -->
					<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/notice" class="btn btn-primary">List of Notice</a>
										</div>
                                        </div>
                                        
								</div>
					<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Update Notice</h2>
							</header>			
					<div class="row">
						
						<div class="col-md-12">
						<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class' => 'form-horizontal']]); ?>
	               
								<section class="panel">
									<input name="cid" type="hidden" value="">
									<div class="panel-body">
                                    
                                    
										<div class="form-group">
											<label class="col-sm-2 control-label">Title<span class="required">*</span></label>
											<div class="col-sm-8">
											<input type="text" id="notice-notice_title" class="form-control" name="Notice[notice_title]" maxlength="200" aria-required="true" aria-invalid="true" value="<?php echo $model->notice_title;?>">
    
											</div>
										</div>
  							<div class="form-group">
									<label class="col-sm-2 control-label">Notice Content<span class="required">*</span></label>
											<div class="col-sm-10">
												<?php echo $form->field($model, 'notice_content',['template' => '<div class=\"\" style="margin-left: 15px; ">{input}</div>'])->widget(CKEditor::className(),['editorOptions'=>['width' => '95%']]);?>
										
											</div>
										</div>

										
										<div class="form-group">
											<label class="col-sm-2 control-label">Status<span class="required">*</span></label>
											<div class="col-sm-10">
                                            
                                            <label class="radio-inline">
                                            <input type="radio" id="notice-archive"  name="Notice[archive]" value="0" <?php if($model->archive==0){?> checked="checked"<?php } ?>>Current
                                            </label>
                                            <label class="radio-inline">
                                            <input type="radio" id="notice-archive"  name="Notice[archive]"  value="1" <?php if($model->archive==1){?> checked="checked"<?php } ?>>Archive
                                            </label>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Access<span class="required">*</span></label>
											<div class="col-sm-10">
                                            
                                            <label class="radio-inline">
                                            <input type="radio" id="notice-access"  name="Notice[access]" value="0" <?php if($model->access==0){?> checked="checked"<?php } ?>>Public
                                            </label>
                                            <label class="radio-inline">
                                            <input type="radio" id="notice-access"  name="Notice[access]"  value="1" <?php if($model->access==1){?> checked="checked"<?php } ?>>Private
                                            </label>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Status<span class="required">*</span></label>
											<div class="col-sm-10">
                                            
                                            <label class="radio-inline">
                                            <input type="radio" id="notice-active"  name="Notice[active]" value="1" checked="checked">Active
                                            </label>
                                            <label class="radio-inline">
                                            <input type="radio" id="notice-active"  name="Notice[active]"  value="0">Inactive
                                            </label>
											</div>
										</div>
										
										
                                       <div class="col-sm-9 col-sm-offset-2">
												<button class="btn btn-primary">Submit</button>
												<!-- <input name="submit" id="submit" value="Submit" type="submit" class="btn btn-primary"> -->
												
												<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/notice" class="btn btn-primary">Cancel</a>
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
					
					