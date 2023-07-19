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
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/editstaff.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
				<input type="hidden" id="idD" name="idD" value="<?php echo $_GET['id']; ?>" >
<?php
$sql=mysqli_query($conn,"select * from staff where id='".$_GET['id']."'");
$rw=mysqli_fetch_array($sql);
?>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">prefix Staff Name (eg:Ms./Mr.) <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="prename" name="prename" required="required" value="<?php echo $rw['prename']; ?>" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Staff Name <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sname" name="sname" required="required" value="<?php echo $rw['sname']; ?>" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sdegi" name="sdegi" value="<?php echo $rw['sdegi']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone No 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sphn" name="sphn" value="<?php echo $rw['sphn']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Division 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="sdiv" name="sdiv" value="<?php echo $rw['sdiv']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email ID 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="semail" name="semail" value="<?php echo $rw['semail']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="img" name="img" accept=".png, .jpg, .jpeg" class="form-control col-md-7 col-xs-12">
						  <?php if($rw['img']!='') { ?>
<span id="att1"><?php echo $rw['img'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','img');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
                      
                
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Update</button>
						   <a href="<?php echo $home_path; ?>/pages/operation/viewstaff.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
			document.location.href="<?php echo $home_path; ?>/pages/operation/editstaff.php?id=<?php echo $_GET['id']; ?>"
			
		}
		
		
		
function selPDFDel(a,b){
     $.ajax({
type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/selDELSTAFF.php',
	data:{
	delid:a,
	pge:b
	},
	success:function(data){
		/*  alert(data); */
		 if(data==1){
		     location.reload();
		 }else{
		     alert("Error!.");
		 }
	}
});
}

		
		</script>
<?php
include("../../footer.php");
?>