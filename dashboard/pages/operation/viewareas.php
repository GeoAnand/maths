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
                    <h2>Area of Interest</h2>
                   
                    <div class="clearfix"></div>
                  </div>
				  
				  
<style>
.tathead{ display: block;border:none; }

.tatbody {
   /*  height: 350px; */       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
	border:none;
}

/* .tableFixHead          { overflow-y: auto; height: 350px; } */
.tableFixHead          { overflow-y: auto; height: 350px; }
.tableFixHead thead tr th { position: sticky; top: 0; }
.tableFixHead thead th th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#3c8dbc;color:#fff; }
</style>

                  <div class="x_content">



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addarea.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">      

<?php
$sq2=mysqli_query($conn,"select * from  profileintareas where fuid='".$_GET['facid']."'");
$nmR=mysqli_num_rows($sq2);
?>				           
<div class="col-md-5" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Add Area (Add Number of Rows)
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor" name="noauthor" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>


<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>		
<div class="col-md-5" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select Faculty Name<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <select name="facname" id="facname" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select faculty Name --</option>
<?php $sql =  "select * from faculty order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
if(isset($_GET['facid'])  && $_GET['facid']!='' && $_GET['facid']==$fetch['id']){
?>
<option value="<?=$fetch['id']?>" selected ><?=$fetch['fname']?></option>
<?php }else{ ?>
<option value="<?=$fetch['id']?>"><?=$fetch['fname']?></option>
<?php } } ?>
</select>
</div>
</div>
</div>
<?php } ?>					  

<!--<div class="col-md-4" >
<label for="exampleInputPassword1">Number of Rows<span style="color:red;">&nbsp;*</span></label>
	<input type="text" class="form-control" name="noauthor" id="noauthor" placeholder="" onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php echo $nmR; ?>" >
</div>-->

<?php

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_SESSION['uid']."'"));	
$rd2=mysqli_fetch_array(mysqli_query($conn,"select * from faculty where id='".$_GET['facid']."'"));
$rd3=mysqli_fetch_array(mysqli_query($conn,"select * from user where facid='".$_GET['facid']."'"));
?>
<input type="hidden" id="fuid" name="fuid" value="<?php if(isset($_GET['facid']) && $_GET['facid']!=''){ echo $_GET['facid'];}else{echo $rd1['facid'];} ?>">	
<input type="hidden" id="fid" name="fid" value="<?php if(isset($rw['fid']) && $rw['fid']!=''){ echo $rw['fid'];}else{echo "";} ?>">	
<input type="hidden" id="fusrid" name="fusrid" value="<?php if(isset($rd3['id']) && $rd3['id']!=''){ echo $rd3['id'];}else{echo "";} ?>">

<div style="margin:6px 0 0 0;" class="col-md-12 tableFixHead">
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
	<tr>
	  <th style="width:85%;">Interested Areas</th>
	  <!--<th style="width:25%;">Link</th>-->
	  <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>

<?php
$sql="select * from  profileintareas where fuid='".$_GET['facid']."'";
$sql1=mysqli_query($conn,$sql);
//if(mysqli_num_rows($sql1)>0){
while($rw=mysqli_fetch_array($sql1)){


?>	

<input type="text" id="intid" name="intid[]" value="<?php if(isset($rw['id']) && $rw['id']!=''){ echo $rw['id'];}else{echo "";} ?>" style="display:none;">
		
<tr>
<td><input type="text" id="intareas<?php echo $x ; ?>" name="intareas[]" class="form-control" value="<?php echo $rw['intareas'] ; ?>" style="width:100%;"  onkeypress="return pointNum(event)" /></td>
<!--<td><input type="text" id="intlink<?php echo $x ; ?>" name="intlink[]" class="form-control" value="<?php //echo $rq['intlink'] ; ?>" style="width:500px;"  onkeypress="return pointNum(event)" /></td>-->
<!--<td class='chng' style='width:45px;text-align:center;'><img class='rem' src='../../images/del.png' style='width:15px;height:15px;text-align:center;cursor:pointer;'  onclick="delSBt('<?php echo $rw['id'];?>');"></td>-->
<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/selintareaDelete.php?id=<?php echo $rw['id']; ?>&facid=<?php echo $_GET['facid']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
</tr>
<?php }  ?>                 
</tbody>
<tbody id="addedRowsRM" style="overflow:auto;height:50px;">

</tbody>
</table>
 </div>

 
	<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	
	   <button type="submit" class="btn btn-success">Submit</button>
	   <!--<a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php"><button class="btn btn-primary" type="button">VIew</button></a>-->
	   
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
$(document).ready(function(){
});

function selCHg(){

	facname=$('#facname').val(); 
	
	document.location.href="<?php echo $home_path; ?>/pages/operation/viewareas.php?fid=&facid="+facname;
}

function selNoRws(){
	$('#addedRowsRM').html(""); 
	nmrs=$('#nmrs').val(); 
	
	noauthor=$('#noauthor').val(); 
	//alert(noauthor);  
	if(noauthor>0){
		$('#addedRowsRM').show(); 
	}else{
		$('#addedRowsRM').hide(); 
	}
	a=nmrs;

	for(b=1;b<=noauthor;b++){	
		a++;
		var recRow1="<tr><td><input type='text' id='intareas"+a+"' name='intareas[]' class='form-control' value='' style='width:100%;' onkeypress='return pointNum(event)'/></td><td class='chng' style='width:45px;text-align:center;'><img class='rem' src='../../images/del.png' style='width:15px;height:15px;text-align:center;cursor:pointer;'></td></tr>";
		jQuery('#addedRowsRM').append(recRow1);
	} 	
}



function delSBt(a){
/* alert(a); */
swal({
    title: "Are you sure?",
    text: "Do you want to delete!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes, I am sure!',
    cancelButtonText: "No, cancel it!",
    closeOnConfirm: false,
    closeOnCancel: false
 },
 function(isConfirm){
   if (isConfirm){
     /* swal("Shortlisted!", "Candidates are successfully shortlisted!", "success"); */
	 id=a;
		$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/selintareaDelete.php',
		data:{
		id:id
		},
		success:function(data){
			if(data==1){
				swal("Deleted!", "Your form has been deleted.");
				document.location.href="<?php echo $home_path;?>/pages/operations/profileaward.php?del=del";
			}else{
				swal("Error!", "Your form not Submitted.");
			}
		}
		});
    } else {
      swal("Cancelled", "error");
         e.preventDefault();
    }
 });
}
	
	
</script>



<?php
include("../../footer.php");
?>