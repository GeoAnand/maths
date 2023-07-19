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



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addprogram.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">      

<?php
$sq2=mysqli_query($conn,"select * from  profilejournal where fuid='".$_GET['facid']."'");
$nmR=mysqli_num_rows($sq2);
?>				           
<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of Rows
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor" name="noauthor" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>


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



<!--<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>		
<div class="col-md-5" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select Year<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
<select name="year" id="year" class="form-control col-md-7 col-xs-12 select2"  >
<option value="">-- Select Year Name --</option>
</select>
</div>
</div>
</div>
<?php } ?>-->


<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>		
<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select Semester<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
 <select name="sem" id="sem" class="form-control col-md-7 col-xs-12 select2"   onchange="selSEMChg();" required>
<?php  if(isset($_GET['deg']) && $_GET['deg']!=''){   ?>

<option value="">-- Select Semester --</option>
<?php $sql =  "select * from programcat where deg='".$_GET['deg']."' group by sem  ORDER BY convert(`sem`, decimal) ASC";
$val = mysqli_query($conn,$sql);
while($fetch4=mysqli_fetch_array($val))
{ 
$sql1=mysqli_query($conn,"select * from semester where id='".$fetch4['sem']."'");
$fetch3=mysqli_fetch_array($sql1);  
    
if(isset($_GET['sem'])  && $_GET['sem']==$fetch4['sem']){
?>
<option value="<?=$fetch4['sem']; ?>" selected ><?=$fetch3['sem']?></option>
<?php }else{ ?>
<option value="<?=$fetch4['sem']; ?>"><?=$fetch3['sem']?></option>
<?php } } ?>

<?php }else{ ?>
<!--<select name="sem" id="sem" class="form-control col-md-7 col-xs-12 select2"  onchange="selSEMChg();" required>-->
<option value="">-- Select Semester --</option>

<?php } ?>
</select>
</div>
</div>
</div>
<?php } ?>

<?php

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_SESSION['uid']."'"));	
$rd2=mysqli_fetch_array(mysqli_query($conn,"select * from faculty where id='".$_GET['facid']."'"));
$rd3=mysqli_fetch_array(mysqli_query($conn,"select * from user where facid='".$_GET['facid']."'"));
?>
<input type="hidden" id="fuid" name="fuid" value="<?php if(isset($_GET['facid']) && $_GET['facid']!=''){ echo $_GET['facid'];}else{echo $rd1['facid'];} ?>">	
<input type="hidden" id="fid" name="fid" value="<?php if(isset($rw['fid']) && $rw['fid']!=''){ echo $rw['fid'];}else{echo "0";} ?>">	
<input type="hidden" id="fusrid" name="fusrid" value="<?php if(isset($rd3['id']) && $rd3['id']!=''){ echo $rd3['id'];}else{echo "";} ?>">

<div style="margin:6px 0 0 0;" class="col-md-12 tableFixHead">
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
	<tr>
        <th style="width:25%;">Course No.</th>
        <th style="width:25%;">Course Name</th>
		
        <th style="width:15%;">Credit</th>
        
        <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>
<?php
$sql="select * from programnew where deg='".$_GET['deg']."' AND sem='".$_GET['sem']."' order by id ASC";
$sql1=mysqli_query($conn,$sql);
//if(mysqli_num_rows($sql1)>0){
while($rw=mysqli_fetch_array($sql1)){
?>	
<input type="text" id="intid" name="intid[]" value="<?php if(isset($rw['id']) && $rw['id']!=''){ echo $rw['id'];}else{echo "";} ?>" style="display:none;">
<tr>


<!--<td><textarea  id="cno<?php echo $x ; ?>" name="cno[]" class="form-control" style="width:100%;"><?php if(isset($rw['cno'])) { echo $rw['cno'] ;} ?></textarea></td>
<td><textarea  id="cname<?php echo $x ; ?>" name="cname[]" class="form-control" style="width:100%;"><?php if(isset($rw['cno'])) { echo $rw['cname'] ;} ?></textarea></td>
<td><textarea  id="credit<?php echo $x ; ?>" name="credit[]" class="form-control" style="width:100%;"><?php if(isset($rw['cno'])) { echo $rw['credit'] ;} ?></textarea></td>

<td><textarea  id="des<?php echo $x ; ?>" name="des[]" class="form-control" style="width:100%;"><?php if(isset($rw['cno'])) { echo $rw['des'] ;} ?></textarea></td>-->

<td>
    
   <input type="text" id="cno<?php echo $x ; ?>" name="cno[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['cno'])) { echo $rw['cno'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="cname<?php echo $x ; ?>" name="cname[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['cname'])) { echo $rw['cname'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="credit<?php echo $x ; ?>" name="credit[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['credit'])) { echo $rw['credit'] ;} ?>" > 
    
</td>

<!--<td>
    
   <input type="text" id="des<?php echo $x ; ?>" name="des[]" class="form-control" style="width:100%;" value="<?php if(isset($rw['cno'])) { echo $rw['des'] ;} ?>" > 
    
</td>-->



<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/selpsemDelete.php?id=<?php echo $rw['id']; ?>&facid=<?php echo $_GET['facid']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
</tr>
<?php }  ?>                 
</tbody>
<tbody id="addedRowsRM" style="overflow:auto;height:50px;">

</tbody>
</table>



<br>

<!-- <h3>Winter</h3>

<br>


<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of Rows
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor1" name="noauthor1" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws1();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>



<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
	<tr>
        <th style="width:25%;">Course No.</th>
        <th style="width:25%;">Course Name</th>
        <th style="width:15%;">Credit</th>
        
        <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>
<?php
$sql2="select * from programnewwin where  deg='".$_GET['deg']."' AND sem='".$_GET['sem']."' order by id ASC";
$sql12=mysqli_query($conn,$sql2);
//if(mysqli_num_rows($sql12)>0){
while($rw2=mysqli_fetch_array($sql12)){
?>	



<tr>



<td>
    <input type="text" id="intid1" name="intid1[]" value="<?php if(isset($rw2['id']) && $rw2['id']!=''){ echo $rw2['id'];}else{echo "";} ?>" style="display:none;">
    
   <input type="text" id="wcno<?php echo $x ; ?>" name="wcno[]" class="form-control" style="width:100%;" value="<?php if(isset($rw2['wcno'])) { echo $rw2['wcno'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="wcname<?php echo $x ; ?>" name="wcname[]" class="form-control" style="width:100%;" value="<?php if(isset($rw2['wcname'])) { echo $rw2['wcname'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="wcredit<?php echo $x ; ?>" name="wcredit[]" class="form-control" style="width:100%;" value="<?php if(isset($rw2['wcredit'])) { echo $rw2['wcredit'] ;} ?>" > 
    
</td>





<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/selpwinDelete.php?id=<?php echo $rw2['id']; ?>&facid=<?php echo $_GET['facid']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
</tr>
<?php }  ?>                 
</tbody>
<tbody id="addedRowsRM1" style="overflow:auto;height:50px;">

</tbody>
</table> -->


<!-- <br>

<h3>Summer</h3>

<br>



<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of Rows
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor2" name="noauthor2" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws2();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>



<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
	<tr>
        <th style="width:25%;">Course No.</th>
        <th style="width:25%;">Course Name</th>
        <th style="width:15%;">Credit</th>
        
        <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>
<?php
$sql3="select * from programnewsmr where  deg='".$_GET['deg']."' AND sem='".$_GET['sem']."'  order by id ASC";
$sql13=mysqli_query($conn,$sql3);
//if(mysqli_num_rows($sql1)>0){
while($rw3=mysqli_fetch_array($sql13)){
?>	



<tr>

<td>
    <input type="text" id="intid2" name="intid2[]" value="<?php if(isset($rw3['id']) && $rw3['id']!=''){ echo $rw3['id'];}else{echo "";} ?>" style="display:none;">
   <input type="text" id="scno<?php echo $x ; ?>" name="scno[]" class="form-control" style="width:100%;" value="<?php if(isset($rw3['scno'])) { echo $rw3['scno'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="scname<?php echo $x ; ?>" name="scname[]" class="form-control" style="width:100%;" value="<?php if(isset($rw3['scname'])) { echo $rw3['scname'] ;} ?>" > 
    
</td>

<td>
    
   <input type="text" id="scredit<?php echo $x ; ?>" name="scredit[]" class="form-control" style="width:100%;" value="<?php if(isset($rw3['scredit'])) { echo $rw3['scredit'] ;} ?>" > 
    
</td>





<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/selpsmrDelete.php?id=<?php echo $rw3['id']; ?>&facid=<?php echo $_GET['facid']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
</tr>
<?php }  ?>                 
</tbody>
<tbody id="addedRowsRM2" style="overflow:auto;height:50px;">

</tbody>
</table> -->











	<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
	   <button type="submit" class="btn btn-success">Submit</button>
	   <!--<a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php"><button class="btn btn-primary" type="button">VIew</button></a>-->
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
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/selprogram.php',
		data:{
		deg:deg
		},
		success:function(data){
		    //alert(data);
		    opt=data.split('&#');
		    $('#year').html(opt[0]); 
		    $('#sem').html(opt[1]); 
		    
			/*if(data==1){
				swal("Deleted!", "Your form has been deleted.");
				document.location.href="<?php echo $home_path;?>/pages/operations/profileaward.php?del=del";
			}else{
				swal("Error!", "Your form not Submitted.");
			}*/
		}
		});
	//document.location.href="<?php echo $home_path; ?>/pages/operation/viewprogram.php?fid=&facid="+deg;
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
			var recRow1='<tr id="rowCount1'+rowCountR+'"><td><input type="text" id="cno'+rowCountR+'" name="cno[]"  class="form-control" style="width:100%;"></td><td><input type="text"  id="cname'+a+'" name="cname[]" class="form-control" style="width:100%;"></td><td><input type="text" id="credit'+a+'" name="credit[]" class="form-control" style="width:100%;"></td><td style="text-align:center;"><a href="javascript:void(0);" onclick="removeRow('+rowCountR+');" name="remove['+rowCountR+']" id="remove_'+ rowCountR +'" class="deleterecord btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
		jQuery('#addedRowsRM').append(recRow1);
	} 	
}



var rowCountR1 = 0; 
function selNoRws1(){
	$('#addedRowsRM1').html(""); 
	nmrs=$('#nmrs1').val(); 
	
	noauthor1=$('#noauthor1').val(); 
	//alert(noauthor);  
	if(noauthor1>0){
		$('#addedRowsRM1').show(); 
	}else{
		$('#addedRowsRM1').hide(); 
	}
	a=nmrs;


	for(b=1;b<=noauthor1;b++){

rowCountR1=rowCountR1+1; 		
		a++;
			var recRow11='<tr id="rowCount1'+rowCountR1+'"><td><input type="text" id="wcno'+rowCountR1+'" name="wcno[]"  class="form-control" style="width:100%;"></td><td><input type="text"  id="wcname'+a+'" name="wcname[]" class="form-control" style="width:100%;"></td><td><input type="text" id="wcredit'+a+'" name="wcredit[]" class="form-control" style="width:100%;"></td><td style="text-align:center;"><a href="javascript:void(0);" onclick="removeRow('+rowCountR1+');" name="remove['+rowCountR1+']" id="remove_'+ rowCountR1 +'" class="deleterecord btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
		jQuery('#addedRowsRM1').append(recRow11);
	} 	
}



var rowCountR2 = 0; 
function selNoRws2(){
	$('#addedRowsRM2').html(""); 
	nmrs=$('#nmrs2').val(); 
	
	noauthor2=$('#noauthor2').val(); 
	//alert(noauthor);  
	if(noauthor2>0){
		$('#addedRowsRM2').show(); 
	}else{
		$('#addedRowsRM2').hide(); 
	}
	a=nmrs;


	for(b=1;b<=noauthor2;b++){

rowCountR2=rowCountR2+1; 		
		a++;
			var recRow12='<tr id="rowCount2'+rowCountR2+'"><td><input type="text" id="scno'+rowCountR2+'" name="scno[]"  class="form-control" style="width:100%;"></td><td><input type="text"  id="scname'+a+'" name="scname[]" class="form-control" style="width:100%;"></td><td><input type="text" id="scredit'+a+'" name="scredit[]" class="form-control" style="width:100%;"></td><td style="text-align:center;"><a href="javascript:void(0);" onclick="removeRow('+rowCountR2+');" name="remove['+rowCountR2+']" id="remove_'+ rowCountR2 +'" class="deleterecord btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
		jQuery('#addedRowsRM2').append(recRow12);
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