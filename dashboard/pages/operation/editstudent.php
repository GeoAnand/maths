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
                    <h2>Edit Student</h2>
          
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
                  
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/editstu.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
				<input type="hidden" id="idD" name="idD" value="<?php echo $_GET['id']; ?>" >
<?php
$sql=mysqli_query($conn,"select * from student where id='".$_GET['id']."'");
$rw=mysqli_fetch_array($sql);
?>




<div class="col-md-4">	

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Degree</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php
$sq=mysqli_query($conn,"select * from student where id='".$_GET['id']."'");

$rq=mysqli_fetch_array($sq);

?>
                            <?php $sqlBS=mysqli_query($conn,"select * from studdeg order by sname ASC");?> 
                            
                         <select name="deg" id="deg" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">

  
<?php while($rowBS=mysqli_fetch_array($sqlBS)) { ?>
<?php if($rowBS['id']==$rq['deg']) { ?>
<option value="<?php echo $rowBS['id'];?>" selected ><?php echo ucwords($rowBS['sname']);?></option>
<?php }else{ ?>
<option value="<?php echo $rowBS['id'];?>"><?php echo ucwords($rowBS['sname']);?></option>
<?php } }  ?>
					    
</select>
						  
                        </div>
                      </div>
                      
                      
                      
                          
                      
                   
                   

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Year <span class="required" >*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="yr" name="yr" required="required" value="<?php echo $rw['yr']; ?>" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      
                      
                      
                     
                      
                      
                      
                      
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Name
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="sname" name="sname" value="<?php echo $rw['sname']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">RollNo
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="rollno" name="rollno" value="<?php echo $rw['rollno']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>  
                      
                      
                     
                      	
                      
                      
                      
                      
                      
  </div>                    
                      
                      
                      
               
                      
                       
                      
                
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Update</button>
						   <a href="<?php echo $home_path; ?>/pages/operation/editstudent.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
			document.location.href="<?php echo $home_path; ?>/pages/operation/editevent.php?id=<?php echo $_GET['id']; ?>"
			
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