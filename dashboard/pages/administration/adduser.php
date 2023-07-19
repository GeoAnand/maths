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
                    <h2>Add User</h2>
          
                    <div class="clearfix"></div>
                  </div>
				 


                  <div class="x_content">
                    <br />
                   <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/administration/action/adduser.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
	
<div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Faculty Name<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <select name="name" id="name" class="form-control col-md-7 col-xs-12 chosen-select" required="">
<option value="">-- Faculty Name --</option>
<?php $sql =  "select * from  faculty order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
?>
<option value="<?=$fetch['id']?>"><?=$fetch['fname']?></option>
<?php } ?>
</select>
</div>
</div>		

					<!--<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>-->
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Address
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="address" name="address"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Phone no  </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="phoneno" name="phoneno" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					
                 </div>
				 
                     
				 
						<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Submit</button>
						   <a href="<?php echo $home_path; ?>/pages/administration/viewuser.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
                        </div>
                      </div>
					  
					  
                    </form>
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