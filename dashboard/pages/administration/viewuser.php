<?php

include("../../header.php");

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
              
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View User</h2>
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
				  
				   <!--<div class="form-group" style="float:left;">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                          <button class="btn btn-primary" type="button">Add Faculty</button>
						
                        </div>
                      </div>-->


                  <div class="x_content">
                    <a href="<?php echo $home_path; ?>/pages/administration/adduser.php"><button class="btn btn-primary" type="button">Add User</button></a>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="width:25%;">Username</th>
                          <th style="width:25%;">Password</th>
                          <th style="width:25%;">Name</th>
						  <th style="width:25%;">Address</th>
                          <th style="width:25%;">Phone no</th>
						  <th style="width:25%;">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql=mysqli_query($conn,"select * from user where status='1'");
while($rw=mysqli_fetch_array($sql)){
?>					  
                        <tr>
                          <td><?php echo $rw['username']; ?></td>
                          <td><?php echo $rw['password']; ?></td>
                          <td><?php echo $rw['name']; ?></td>
						  <td><?php echo $rw['address']; ?></td>
                          <td><?php echo $rw['phoneno']; ?></td>
                          
                         <td>
                            <!--<a href="<?php echo $home_path; ?>/pages/administration/viewuser.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="<?php echo $home_path; ?>/pages/administration/edituser.php?id=<?php echo $rw['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo $home_path; ?>/pages/administration/action/deleteuser.php?id=<?php echo $rw['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
       <?php } ?>                 
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
			  
			  
			  
			  
			  
			  
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php
include("../../footer.php");
?>