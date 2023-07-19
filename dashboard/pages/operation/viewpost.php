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
                    <h2>View Post Doctoral Fellows</h2>
                   
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



                  <div class="x_content">
                    <a href="<?php echo $home_path; ?>/pages/operation/addpost.php"><button class="btn btn-primary" type="button">Add Post Doctoral Fellows
</button></a>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="width:25%;">Name</th>
                          <th style="width:25%;">Email</th>
                         
                          <th style="width:25%;">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql=mysqli_query($conn,"select * from postdoc where status='1'");
while($rw=mysqli_fetch_array($sql)){
?>					  
                        <tr>
                          <td><?php echo $rw['name']; ?></td>
                          <td><?php echo $rw['email']; ?></td>
                          
                         <td>
                            <!--<a href="<?php echo $home_path; ?>/pages/master/viewfaculty.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="<?php echo $home_path; ?>/pages/operation/editpost.php?id=<?php echo $rw['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo $home_path; ?>/pages/operation/action/deletepostt.php?id=<?php echo $rw['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
			document.location.href="<?php echo $home_path; ?>/pages/operation/viewpost.php?id=<?php echo $_GET['id']; ?>"
			
		}
		</script>
		
<?php
include("../../footer.php");
?>