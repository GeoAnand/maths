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
                    <h2>Programs</h2>
                   
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



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addprogramdes.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">      

<?php
$sq2=mysqli_query($conn,"select * from  profilejournal where fuid='".$_GET['facid']."'");
$nmR=mysqli_num_rows($sq2);
?>				           

<div class="row">

<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3') { ?>		
<div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select degree<span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <select name="deg" id="deg" class="form-control col-md-7 col-xs-12 select2"  onchange="selSEMChg();" required>
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



</div>




<?php

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_SESSION['uid']."'"));	
$rd2=mysqli_fetch_array(mysqli_query($conn,"select * from faculty where id='".$_GET['facid']."'"));
$rd3=mysqli_fetch_array(mysqli_query($conn,"select * from user where facid='".$_GET['facid']."'"));
?>
<input type="hidden" id="fuid" name="fuid" value="<?php if(isset($_GET['facid']) && $_GET['facid']!=''){ echo $_GET['facid'];}else{echo $rd1['facid'];} ?>">	
<input type="hidden" id="fid" name="fid" value="<?php if(isset($rw['fid']) && $rw['fid']!=''){ echo $rw['fid'];}else{echo "";} ?>">	
<input type="hidden" id="fusrid" name="fusrid" value="<?php if(isset($rd3['id']) && $rd3['id']!=''){ echo $rd3['id'];}else{echo "";} ?>">


<div class="row">
<?php
$sql3="select * from programnewdes where  deg='".$_GET['deg']."'   order by id ASC";
$sql13=mysqli_query($conn,$sql3);
$rw3=mysqli_fetch_array($sql13);
?>	
    <input type="text" id="intid" name="intid" value="<?php echo $rw3['id']; ?>" style="display:none;">
    
     <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Program Overview
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <textarea id="po" name="po"  class="form-control col-md-7 col-xs-12"><?php if(isset($rw3['po'])){ echo nl2br($rw3['po']); }else{ echo ""; } ?></textarea>
						  
</div>
</div>
</div>


    
    
     <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Selection Process
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <textarea id="process" name="process"  class="form-control col-md-7 col-xs-12"><?php if(isset($rw3['process'])){ echo nl2br($rw3['process']); }else{ echo ""; } ?></textarea>
						  
</div>
</div>
</div>


 <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Structure of the Program
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <textarea id="sp" name="sp"  class="form-control col-md-7 col-xs-12"><?php if(isset($rw3['sp'])){ echo nl2br($rw3['sp']); }else{ echo ""; } ?></textarea>
						  
</div>
</div>
</div>
    
    </div>


<div class="row">

 <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">View Syllabus
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="file" id="syll" name="syll" accept=".pdf" class="form-control col-md-7 col-xs-12">
						   <?php if($rw3['syll']!='') { ?>
<span id="att1"><?php echo $rw3['syll'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw3['id']; ?>','syll');">Delete</a><br>
<?php } ?>
</div>
</div>
</div>



 
 <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">View Curriculum
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
 <input type="file" id="cur" name="cur" accept=".pdf" class="form-control col-md-7 col-xs-12">
						   <?php if($rw3['cur']!='') { ?>
<span id="att1"><?php echo $rw3['cur'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw3['id']; ?>','cur');">Delete</a><br>
<?php } ?>
</div>
</div>
</div>
    
     
    
    
    <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Elective
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
 <input type="file" id="ele" name="ele" accept=".pdf" class="form-control col-md-7 col-xs-12">
						   <?php if($rw3['ele']!='') { ?>
<span id="att1"><?php echo $rw3['ele'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw3['id']; ?>','ele');">Delete</a><br>
<?php } ?>
</div>
</div>
</div>
    
    
    </div>
    
    
    
    
 
<div class="row">

 <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Semester Note *
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <textarea id="note1" name="note1"  class="form-control col-md-7 col-xs-12"><?php if(isset($rw3['note1'])){ echo nl2br($rw3['note1']); }else{ echo ""; } ?></textarea>
						  
</div>
</div>
</div>



 
 <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Semester Note **
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
 <textarea id="note2" name="note2"  class="form-control col-md-7 col-xs-12"><?php if(isset($rw3['note2'])){ echo nl2br($rw3['note2']); }else{ echo ""; } ?></textarea>
						  
</div>
</div>
</div>
    
     
    
    
    <div class="col-md-4" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Semester Note ***
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
 <textarea id="note3" name="note3"  class="form-control col-md-7 col-xs-12"><?php if(isset($rw3['note3'])){ echo nl2br($rw3['note3']); }else{ echo ""; } ?></textarea>
						  
</div>
</div>
</div>
    
    
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


function selSEMChg(){
    	deg=$('#deg').val(); 
    	sem=$('#sem').val(); 
    	if(deg==''){
    	    alert("select Degree");
    	}else{
    	    document.location.href="<?php echo $home_path;?>/pages/operation/viewprogramdes.php?deg="+deg;
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
    
    
function selPDFDel(a,b){
     $.ajax({
type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/selpgmdesdel.php',
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