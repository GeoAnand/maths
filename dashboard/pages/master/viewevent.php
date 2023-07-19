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
                    <h2>View Event Category</h2>
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



<?php if(isset($_GET['msg']) && $_GET['msg']=='success'){ ?>			 
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Success!</strong> Record deleted.
                </div>
	<?php }else if(isset($_GET['msg']) && $_GET['msg']=='error'){ ?>
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Error!</strong> Form not submitted.
                </div>
	<?php } ?>


	
				   <!--<div class="form-group" style="float:left;">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                          <button class="btn btn-primary" type="button">Add Faculty</button>
						
                        </div>
                      </div>-->


                  <div class="x_content">
                    <a href="<?php echo $home_path; ?>/pages/master/addevent.php"><button class="btn btn-primary" type="button">Add Event Category</button></a>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="width:25%;">Event Category Name</th>
                        
                          <th style="width:25%;">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql=mysqli_query($conn,"select * from eventcat_math where status='1'");
while($rw=mysqli_fetch_array($sql)){
?>					  
                        <tr>
                          <td><?php echo $rw['ename']; ?></td>
                         
                         <td>
                            <!--<a href="<?php echo $home_path; ?>/pages/master/viewfaculty.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="<?php echo $home_path; ?>/pages/master/editevent.php?id=<?php echo $rw['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo $home_path; ?>/pages/master/action/deletefaculty.php?id=<?php echo $rw['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        <br>
        
        <br>
		
		<script>
		function myfunc(){
			document.location.href="<?php echo $home_path; ?>/pages/master/viewevent.php?id=<?php echo $_GET['id']; ?>"
			
		}
		</script>
		
<?php
include("../../footer.php");
?>