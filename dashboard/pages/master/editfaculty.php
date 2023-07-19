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
                    <h2>Edit Faculty</h2>
          
                    <div class="clearfix"></div>
                  </div>
	<?php if(isset($_GET['msg']) && $_GET['msg']=='success'){ ?>			 
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Success!</strong> Form updated.
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
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/master/action/editfaculty.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
				<input type="hidden" id="idD" name="idD" value="<?php echo $_GET['id']; ?>" >
<?php
$sql=mysqli_query($conn,"select * from faculty where id='".$_GET['id']."'");
$rw=mysqli_fetch_array($sql);
?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Faculty Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fname" name="fname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rw['fname']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rw['fdesig']; ?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Division</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
$sq=mysqli_query($conn,"select * from faculty where id='".$_GET['id']."'");

$rq=mysqli_fetch_array($sq);

?>
                            <?php $sqlBS=mysqli_query($conn,"select * from division order by fdiv ASC");?> 
                            
                         <select name="fdivision" id="fdivision" class="form-control col-md-7 col-xs-12 select2"  ">

 
<?php while($rowBS=mysqli_fetch_array($sqlBS)) { ?>
<?php if($rowBS['id']==$rq['fdivision']) { ?>
<option value="<?php echo $rowBS['id'];?>" selected ><?php echo ucwords($rowBS['fdiv']);?></option>
<?php }else{ ?>
<option value="<?php echo $rowBS['id'];?>"><?php echo ucwords($rowBS['fdiv']);?></option>
<?php } }  ?>
					    
</select>
						  
                        </div>
                      </div>
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Update</button>
						   <a href="<?php echo $home_path; ?>/pages/master/viewfaculty.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
			document.location.href="<?php echo $home_path; ?>/pages/master/editfaculty.php?id=<?php echo $_GET['id']; ?>"
			
		}
		</script>
<?php
include("../../footer.php");
?>