<?php
include("../../header.php");
error_reporting(0);
?>

 


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
              
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Research Description</h2>
          
                    <div class="clearfix"></div>
                  </div>
				 


                  <div class="x_content">
				  
				  
<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>				  
<div class="col-md-12" style="">
<div class="col-md-6">
<div class="form-group">


<label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Select Faculty Name<span class="required">*</span>
</label>

<div class="col-md-8 col-sm-8 col-xs-12">
  <select name="facname" id="facname" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select faculty Name --</option>
<?php $sql =  "select * from faculty order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
if(isset($_GET['facid']) && $_GET['facid']!='' && $_GET['facid']==$fetch['id']){
?>
<option value="<?=$fetch['id']?>" selected ><?=$fetch['fname']?></option>
<?php }else{ ?>
<option value="<?=$fetch['id']?>"><?=$fetch['fname']?></option>
<?php } } ?>
</select>
</div>
</div>	
</div>	
</div>	
<br>
<br>
<br>
<?php } ?>

<br />


<?php
$sql="select * from  research where fuid='".$_GET['facid']."'";
$sql1=mysqli_query($conn,$sql);
//if(mysqli_num_rows($sql1)>0){
$rw=mysqli_fetch_array($sql1);

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_SESSION['uid']."'"));	
$rd2=mysqli_fetch_array(mysqli_query($conn,"select * from faculty where id='".$_GET['facid']."'"));
$rd3=mysqli_fetch_array(mysqli_query($conn,"select * from user where facid='".$_GET['facid']."'"));

?>					
<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addresearch.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">

<input type="hidden" id="fuid" name="fuid" value="<?php if(isset($_GET['facid']) && $_GET['facid']!=''){ echo $_GET['facid'];}else{echo $rd1['facid'];} ?>">	
<input type="hidden" id="fid" name="fid" value="<?php if(isset($rw['fid']) && $rw['fid']!=''){ echo $rw['fid'];}else{echo "";} ?>">	
<input type="hidden" id="fusrid" name="fusrid" value="<?php if(isset($rd3['id']) && $rd3['id']!=''){ echo $rd3['id'];}else{echo "";} ?>">
<?php
//if(isset($_GET['facid']) && $_GET['facid']!='3' && $_GET['facid']!=''){
?>  
	  

                     
				 <div class="col-md-12">
				 
				 <div class="form-group">
                        <label class="control-label col-md-2 col-sm-4 col-xs-12" for="last-name">Current Research Image1 
                        </label>
                        <div class="col-md-7 col-sm-8 col-xs-12">
                          <input type="file" id="fcvpht" name="fcvpht" accept=".jpg, .jpeg, .png" class="form-control col-md-7 col-xs-12">
						   <?php if($rw['fcvpht']!='') { ?>
<span id="att1"><?php echo $rw['fcvpht'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel1('<?php echo $rw['id']; ?>','fcvpht');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
					  
					  
					  	 <div class="form-group">
                        <label class="control-label col-md-2 col-sm-4 col-xs-12" for="last-name">Current Research Image2 
                        </label>
                        <div class="col-md-7 col-sm-8 col-xs-12">
                          <input type="file" id="fcvpht" name="fcvpht1" accept=".jpg, .jpeg, .png"  class="form-control col-md-7 col-xs-12">
						   <?php if($rw['fcvpht1']!='') { ?>
<span id="att1"><?php echo $rw['fcvpht1'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel1('<?php echo $rw['id']; ?>','fcvpht1');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
					  
				   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-4 col-xs-12" for="last-name">Current Research Image3 
                        </label>
                        <div class="col-md-7 col-sm-8 col-xs-12">
                          <input type="file" id="fcvpht" name="fcvpht2" accept=".jpg, .jpeg, .png"  class="form-control col-md-7 col-xs-12">
						   <?php if($rw['fcvpht2']!='') { ?>
<span id="att1"><?php echo $rw['fcvpht2'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel1('<?php echo $rw['id']; ?>','fcvpht2');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
                    					
                    					
                    			
					  
                 </div>
                     
<div class="col-md-12">

	<div class="form-group">
	<label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Current Research Description</label>
	<div class="col-md-10 col-sm-10 col-xs-12">
	<textarea  name="fdesc" id="fdesc"  class="form-control col-md-7 col-xs-12" style="height:150px;"><?php if(isset($rw['fdesc'])){ echo nl2br($rw['fdesc']); }else{ echo ""; } ?></textarea>
	</div>
	</div>
	
	
	
	
	
 </div>				 
						<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="margin-bottom:38px;">
						
                           <button type="submit" class="btn btn-success">Submit</button>
						  
						   
                        </div>
                      </div>
					  
<?php //}  ?>		  
					  
					  
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
$(document).ready(function(){
});

function selCHg(){

	facname=$('#facname').val(); 
	
	document.location.href="<?php echo $home_path; ?>/pages/operation/research.php?fid=&facid="+facname;
}



function selPDFDel(a,b){
     $.ajax({
type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/selPDFDELETE.php',
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

function selPDFDel1(a,b){
     $.ajax({
type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/selPDFDELETE1.php',
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

<!--<script src="<?php echo $home_path; ?>/vendors/select2/dist/js/select2.js"></script>
<script src="<?php echo $home_path; ?>/vendors/select2/dist/js/select2.min.js"></script>
<script src="<?php echo $home_path; ?>/vendors/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo $home_path; ?>/vendors/select2/dist/js/select2.full.js"></script>-->

<!-- chosen JS
============================================ -->	
<!--<script src="<?php echo $home_path; ?>/select2/chosen/chosen.jquery.js"></script>
<script src="<?php echo $home_path; ?>/select2/chosen/chosen-active.js"></script>-->
<!-- select2 JS
============================================ -->
<!--<script src="<?php echo $home_path; ?>/select2/select2/select2.full.min.js"></script>
<script src="<?php echo $home_path; ?>/select2/js/select2/select2-active.js"></script>-->


<?php
include("../../footer.php");
?>