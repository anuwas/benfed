				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
                      <div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="#">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="#"></i></a>
						</div>
					</header>
					<!-- start: page -->
                    <!-- User Profile Start -->
						<section class="panel">
							<header class="panel-heading">
							<h2 class="panel-title">Admin Profile</h2>
							</header>
							<div class="panel-body">
								
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
									  <tr>
                                        <th width="20%">Name</th>
                                        <th width="20%">Status</th>
                                        <th width="20%">Created On</th>
                                        <th width="20%">Action</th>
                                      </tr>
									</thead>
									<tbody>

		<?php 
        /* $sql_cat = "SELECT * FROM admin_master WHERE status='Active' ORDER BY admin_id";
        $sql_ext = mysql_query($sql_cat) or die("Please check the information you have input");
        while($sql_cat_result=mysql_fetch_array($sql_ext)) {
		$id = $sql_cat_result['admin_id'];
        $name = $sql_cat_result['name'];
        $status = $sql_cat_result['status'];
        $add_on = $sql_cat_result['add_on']; */
        ?>

                                <tr class="odd gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="edit_profile.php?cid=">EDIT</a></td>
                                </tr>
                                <?php //} ?>
                                 </tbody>
								</table>
								<div class="row">
								 <div class="col-sm-6">
								<!--<div class="lb-ld"><a href="#">VIEW ALL</a></div>-->
                                    </div>
								</div>
							</div>
						</section>
				    <!-- User Profile END -->
                       