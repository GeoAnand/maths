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
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/editpost.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
				<input type="hidden" id="idD" name="idD" value="<?php echo $_GET['id']; ?>" >
<?php
$sql=mysqli_query($conn,"select * from postdoc where id='".$_GET['id']."'");
$rw=mysqli_fetch_array($sql);
?>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prefix Name (eg:Dr.) <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="prename" name="prename" required="required" value="<?php echo $rw['prename']; ?>" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" value="<?php echo $rw['name']; ?>" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone No 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="phn" name="phn" value="<?php echo $rw['phn']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Office
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ofz" name="ofz" value="<?php echo $rw['ofz']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email Id 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" value="<?php echo $rw['email']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mentor 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="men" name="men" value="<?php echo $rw['men']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Photo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="img" name="img"  class="form-control col-md-7 col-xs-12">
						  <?php if($rw['img']!='') { ?>
<span id="att1"><?php echo $rw['img'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','img');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
                      
                      
                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="type" name="type" value="<?php echo $rw['type']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Link 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="link" name="link" value="<?php echo $rw['link']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Update</button>
						   <a href="<?php echo $home_path; ?>/pages/operation/viewpost.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
	url:'<?php echo $home_path; ?>/pages/operation/action/selDELPOST.php',
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