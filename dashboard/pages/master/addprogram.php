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
                    <h2>Add Faculty</h2>
          
                    <div class="clearfix"></div>
                  </div>
				 


	<?php if(isset($_GET['msg']) && $_GET['msg']=='success'){ ?>			 
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Success!</strong> Form added.
                </div>
	<?php }else if(isset($_GET['msg']) && $_GET['msg']=='error'){ ?>
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Error!</strong> Form not submitted.
                </div>
	<?php } ?>
	
	

                  <div class="x_content">
                    <br />
                   <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/master/action/addprogram.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
					    
					    
					    
	 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Degree Name <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">				    
  <select name="deg" id="deg" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select Degree Name --</option>
<?php $sql =  "select * from studdeg order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
?>

<option value="<?=$fetch['id']?>"><?=$fetch['sname']?></option>
<?php  } ?>
</select>
</div>
</div>
					    
	

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Year <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="year" name="year" required="required" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Semester <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">				    
  <select name="sem" id="sem" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select Degree Name --</option>
<?php $sql =  "select * from semester order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
?>

<option value="<?=$fetch['id']?>"><?=$fetch['sem']?></option>
<?php  } ?>
</select>
</div>
</div>
                    
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Submit</button>
						   <a href="<?php echo $home_path; ?>/pages/master/viewprogram.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
		<script>
		function myfunc(){
			document.location.href="<?php echo $home_path; ?>/pages/master/addprogram.php?id=<?php echo $_GET['id']; ?>"
			
		}
		</script>
<?php
include("../../footer.php");
?>