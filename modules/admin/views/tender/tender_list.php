<?php
/* @var $this yii\web\View */
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>List of Tenders</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tender</span></li>
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
						
								<h2 class="panel-title">List of All Tender</h2>
							</header>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-md">
											<a href="<?php echo  Yii::$app->request->baseUrl;?>/admin/tender/add" class="btn btn-primary">Add Tender <i class="fa fa-plus"></i></a>
										</div>
                                        </div>
                                        
								</div>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
                                            <th width="40%">Title</th>
                                            <th width="15%">Archive</th>
                                            <th width="15%">Action</th>
                                      </tr>
									</thead>
									<tbody>
                                     <?php 
									 foreach ($model as $value) {
									 	
									 ?>
                                     <tr class="odd gradeX">
                                            <td><?php echo $value->title;?></td>
                                           	<td><?php if($value->archive==1){?>Archive<?php } else {?>Current<?php } ?></td>
                                           	
                                           	
                                <td>
                                <a href="<?php echo Yii::$app->homeUrl.'admin/tender/update?id='.$value->tender_id;?>">EDIT</a>
                                &nbsp;|&nbsp;
                                <a href="<?php echo Yii::$app->homeUrl.'admin/tender/delete?id='.$value->tender_id;?>" onClick="return confirm('Are you sure you want to delete?');">DELETE</a>
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