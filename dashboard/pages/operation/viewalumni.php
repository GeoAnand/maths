<?php

include("../../header.php");

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
              
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="overflow-x:scroll">
                  <div class="x_title">
                    <h2>Semester</h2>
                   
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
.tableFixHead          { overflow-y: auto; }
.tableFixHead thead tr th { position: sticky; top: 0; }
.tableFixHead thead th th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#3c8dbc;color:#fff; }
</style>

                  <div class="x_content">



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addalumni.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">      

<?php
$sq2=mysqli_query($conn,"select * from  profilejournal where fuid='".$_GET['facid']."'");
$nmR=mysqli_num_rows($sq2);
?>				           



<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>		
<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select degree<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <select name="deg" id="deg" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();" required>
<option value="">-- Select Degree Name --</option>
<?php $sql =  "select * from programcat  group by deg  ORDER BY convert(`deg`, decimal) ASC";
$val = mysqli_query($conn,$sql);
while($fetch4=mysqli_fetch_array($val))
{ 
$sql1=mysqli_query($conn,"select * from studdeg where id='".$fetch4['deg']."'");
$fetch3=mysqli_fetch_array($sql1);  
    
if(isset($_GET['deg'])  && $_GET['deg']==$fetch4['deg']){
?>
<option value="<?=$fetch4['deg']; ?>" selected ><?=$fetch3['sname']?></option>
<?php }else{ ?>
<option value="<?=$fetch4['deg']; ?>"><?=$fetch3['sname']?></option>
<?php } } ?>
</select>
</div>
</div>
</div>
<?php } ?>					  


<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>		
<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select Year<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <select name="year" id="year" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select Year --</option>
<?php $sql =  "select * from alumniyear order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
if($_GET['year']== $fetch['id']){
?>
<option value="<?=$fetch['id']?>" selected ><?=$fetch['alumniyear']?></option>
<?php }else{ ?>
<option value="<?=$fetch['id']?>"><?=$fetch['alumniyear']?></option>
<?php } } ?>
</select>
</div>
</div>
</div>
<?php } ?>


<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of Rows
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor" name="noauthor" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>

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
        <th style="width:25%;">S No.</th>
        <th style="width:25%;">Name</th>
        <th style="width:15%;">Roll No</th>
        
        <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>
<?php
$sql="select * from alumni where deg='".$_GET['deg']."' AND year='".$_GET['year']."' order by id ASC";
$sql1=mysqli_query($conn,$sql);
//if(mysqli_num_rows($sql1)>0){
while($rw=mysqli_fetch_array($sql1)){
?>	
<input type="text" id="intid" name="intid[]" value="<?php if(isset($rw['id']) && $rw['id']!=''){ echo $rw['id'];}else{echo "";} ?>" style="display:none;">
<tr>




<td>
    
   <input type="text" id="sno<?php echo $x ; ?>" name="sno[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['sno'])) { echo $rw['sno'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="name<?php echo $x ; ?>" name="name[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['name'])) { echo $rw['name'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="roll<?php echo $x ; ?>" name="roll[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['roll'])) { echo $rw['roll'] ;} ?>" > 
    
</td>





<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/selpallDelete.php?id=<?php echo $rw['id']; ?>&facid=<?php echo $_GET['facid']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
</tr>
<?php }  ?>                 
</tbody>
<tbody id="addedRowsRM" style="overflow:auto;height:50px;">

</tbody>
</table>



<br>



	<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	   <button type="submit" class="btn btn-success">Submit</button>
	   
	</div>
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

function selSEMChg(){
    	deg=$('#deg').val(); 
    	sem=$('#sem').val(); 
    	if(deg==''){
    	    alert("select Degree");
    	}else 	if(sem==''){
    	    alert("select Semester");
    	}else{
    	    document.location.href="<?php echo $home_path;?>/pages/operation/viewprogram.php?deg="+deg+"&sem="+sem;
    	}
    
}

function selCHg(){
	deg=$('#deg').val(); 
	year=$('#year').val(); 
	if(deg==''){
    	    alert("select Degree");
    	}else if(year==''){
    	    alert("select Year");
    	}else{
    	    document.location.href="<?php echo $home_path;?>/pages/operation/viewalumni.php?deg="+deg+"&year="+year;
    	}
}


function selCHg1(){
	deg=$('#deg').val(); 
	year=$('#year').val(); 
	if(deg==''){
    	    alert("select Degree");
    	}else if(year==''){
    	    alert("select Year");
    	}else{
    	    document.location.href="<?php echo $home_path;?>/pages/operation/viewalumni.php?deg="+deg+"&year="+year;
    	}
}


var rowCountR = 0; 
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

rowCountR=rowCountR+1; 		
		a++;
			var recRow1='<tr id="rowCount1'+rowCountR+'"><td><input type="text" id="sno'+rowCountR+'" name="sno[]"  class="form-control" style="width:100%;"></td><td><input type="text"  id="name'+a+'" name="name[]" class="form-control" style="width:100%;"></td><td><input type="text" id="roll'+a+'" name="roll[]" class="form-control" style="width:100%;"></td><td style="text-align:center;"><a href="javascript:void(0);" onclick="removeRow('+rowCountR+');" name="remove['+rowCountR+']" id="remove_'+ rowCountR +'" class="deleterecord btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
		jQuery('#addedRowsRM').append(recRow1);
	} 	
}







function removeRow(removeNum) {
	jQuery('#rowCount1'+removeNum).remove(); 
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
	
	function selrem(){
		
	}
	
</script>


<script>
$(document).ready(function(){
$(document).on('click',".rem",function(){
	alert('dsd');
/* 
		if ( $( this ).closest('tr').find(".chng button:last").hasClass("newadd") ) { 
			$( this ).closest('tr').prev().find(".chng").append("<button class='btn newadd' ><i class='entypo-plus'></i></button>");
			}
		$( this ).closest('tr').remove(); */
	}); 
	
});
	
</script>	

<?php
include("../../footer.php");
?>