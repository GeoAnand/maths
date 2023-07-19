

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
              
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>
          
                    <div class="clearfix"></div>
                  </div>
				 


                  <div class="x_content">
				  
				  
<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>				  
<div class="col-md-12" style="">
<div class="col-md-6">
<div class="form-group">
<!--<label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name"><span class="section">Faculty Name</span><span class="required">*</span>
</label>-->

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
<!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->

<?php
$sql="select * from  profile where fuid='".$_GET['facid']."'";
$sql1=mysqli_query($conn,$sql);
//if(mysqli_num_rows($sql1)>0){
$rw=mysqli_fetch_array($sql1);

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_SESSION['uid']."'"));	
$rd2=mysqli_fetch_array(mysqli_query($conn,"select * from faculty where id='".$_GET['facid']."'"));
$rd3=mysqli_fetch_array(mysqli_query($conn,"select * from user where facid='".$_GET['facid']."'"));

?>					
<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addprofile.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">

<input type="hidden" id="fuid" name="fuid" value="<?php if(isset($_GET['facid']) && $_GET['facid']!=''){ echo $_GET['facid'];}else{echo $rd1['facid'];} ?>">	
<input type="hidden" id="fid" name="fid" value="<?php if(isset($rw['fid']) && $rw['fid']!=''){ echo $rw['fid'];}else{echo "";} ?>">	
<input type="hidden" id="fusrid" name="fusrid" value="<?php if(isset($rd3['id']) && $rd3['id']!=''){ echo $rd3['id'];}else{echo "0";} ?>">
<?php
//if(isset($_GET['facid']) && $_GET['facid']!='3' && $_GET['facid']!=''){
?>  
	  
<div class="col-md-6">
    
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Prof. (or) Dr. (or) Initial 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fname1" name="fname1"  class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['fname1'])){ echo $rw['fname1']; }else{ echo $rd2['fname1']; } ?>">
                        </div>
                      </div>
    
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fname" name="fname" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['fname'])){ echo $rw['fname']; }else{ echo $rd2['fname']; } ?>">
                        </div>
                      </div>
                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['fdesig'])){ echo $rw['fdesig']; }else{ echo $rd2['fdesig']; } ?>">
                        </div>
                      </div>
                      
                      
					  
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="femail" name="femail" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['femail'])){ echo $rw['femail']; }else{ echo ""; } ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Alternative Email</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="femail1" name="femail1" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['femail1'])){ echo $rw['femail1']; }else{ echo ""; } ?>">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fmobile" name="fmobile" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['fmobile'])){ echo $rw['fmobile']; }else{ echo ""; } ?>">
                        </div>
                      </div>
					  
					  <!-- <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Profile Background 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fbgd" name="fbgd" class="form-control col-md-7 col-xs-12">
<?php if($rw['fbgd']!='') { ?>
<span id="att1"><?php echo $rw['fbgd'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','fbgd');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>-->
                      
                      
                      		<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Office Address <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="faddr" name="faddr" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['faddr'])){ echo $rw['faddr']; }else{ echo ""; } ?>">
                        </div>
                    </div>
                    
                    
                    					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Education <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="fedu" name="fedu" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['fedu'])){ echo $rw['fedu']; }else{ echo ""; } ?>">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">period of visit
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="visit" name="visit"  class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['visit'])){ echo $rw['visit']; }else{ echo ""; } ?>">
                        </div>
                    </div>
                    
                    
                    
                    				<!--	<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Google Scholar
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="google" name="google" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['google'])){ echo $rw['google']; }else{ echo ""; } ?>">
                        </div>
                    </div>-->
					  
					
                 </div>
				 <div class="col-md-6">
				 
				 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Profile Photo 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fcvpht" name="fcvpht" accept=".png, .jpg, .jpeg" class="form-control col-md-7 col-xs-12">
						   <?php if($rw['fcvpht']!='') { ?>
<span id="att1"><?php echo $rw['fcvpht'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','fcvpht');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
					  
					  
					  
				   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">CV attach</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fcvatt" name="fcvatt" accept=".pdf" class="form-control col-md-7 col-xs-12">
						  <?php if($rw['fcvatt']!='') { ?>
<span id="att1"><?php echo $rw['fcvatt'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','fcvatt');">Delete</a><br>
<?php } ?>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Personal Home Page Link
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fweblink" name="fweblink" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['fweblink'])){ echo $rw['fweblink']; }else{ echo ""; } ?>">
                        </div>
                      </div>
					  
					<!--<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Award photo
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fawdpht" name="fawdpht" class="form-control col-md-7 col-xs-12">
						   <?php if($rw['fawdpht']!='') { ?>
<span id="att1"><?php echo $rw['fawdpht'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','fawdpht');">Delete</a><br>
<?php } ?>
                        </div>
                    </div>-->
                    
                    					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Research Group Page Link
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="freslink" name="freslink"  class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['freslink'])){ echo $rw['freslink']; }else{ echo ""; } ?>">
                        </div>
                    </div>
                    
                    
                    	<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Research Area</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="rai" name="rai"  class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['rai'])){ echo $rw['rai']; }else{ echo ""; } ?>">
                        </div>
                    </div>
                    
                    	<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Website link (Adjunct Faculty only)
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="wla" name="wla"  class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['wla'])){ echo $rw['wla']; }else{ echo ""; } ?>">
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    				<!--	<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Research Book
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="researchbook" name="researchbook" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(isset($rw['researchbook'])){ echo $rw['researchbook']; }else{ echo ""; } ?>">
                        </div>
                    </div>-->
                    
                    					
                    					
                    			
					  
                 </div>
                     
<!--<div class="col-md-12">

	<div class="form-group">
	<label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">About</label>
	<div class="col-md-10 col-sm-10 col-xs-12">
	<textarea  name="fdesc" id="fdesc"  class="form-control col-md-7 col-xs-12" style="height:150px;"><?php if(isset($rw['fdesc'])){ echo nl2br($rw['fdesc']); }else{ echo ""; } ?></textarea>
	</div>
	</div>
	
	
	<div class="form-group">
	<label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">About More</label>
	<div class="col-md-10 col-sm-10 col-xs-12">
	<textarea  name="fdesc1" id="fdesc1"  class="form-control col-md-7 col-xs-12" style="height:150px;"><?php if(isset($rw['fdesc1'])){ echo nl2br($rw['fdesc1']); }else{ echo ""; } ?></textarea>
	</div>
	</div>
	
	
 </div>	-->				 
						<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="margin-bottom:38px;">
						
                           <button type="submit" class="btn btn-success">Submit</button>
						   <!--<a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php"><button class="btn btn-primary" type="button">VIew</button></a>-->
						   
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
	
	document.location.href="<?php echo $home_path; ?>/pages/operation/viewprofile.php?fid=&facid="+facname;
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