<?php
/* @var $this yii\web\View */
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>List of Report Resources</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Resource</span></li>
								<li><span>Listing</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="#"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">List of All Report Resources</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/otherreport/resourceadd" class="btn btn-primary">Add Resource <i class="fa fa-plus"></i></a>
										</div>
                                        </div>
                                        
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th width="30%">Report Title</th>
                                            <th width="20%">Resource Title</th>
                                            <th width="20%">File</th>
                                            <th width="15%">Action</th>
                                      </tr>
									</thead>
									<tbody>
                                     <?php 
									 foreach ($model as $value) {
									 	
									 ?>
                                     <tr class="odd gradeX">
                                     		<td><?php echo $value->otherreport->title;?></td>
                                            <td><?php echo $value->resourece_title;?></td>
          <td><a href="<?php echo Yii::getAlias('@web').'/uploads/otherreport/'.$value->filename;?>" target="_blank" >Link</a></td>
                                <td>
                                <!--  
                                <a href="<?php echo Yii::$app->homeUrl.'admin/otherreport/update?id='.$value->otherreport_resource_id;?>">EDIT</a>
                                &nbsp;|&nbsp;-->
                                <a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/otherreport/resourcedlete?id=<?php echo $value->otherreport_resource_id;?>" onClick="return confirm('Are you sure you want to delete?');">DELETE</a>
                                </td>
                                      </tr>
                                    <?php
									 }
									 ?>
                                    </tbody>
                                    
								</table>
								
								
							</div>
						</section>
						
					<!-- end: page -->
				</section>