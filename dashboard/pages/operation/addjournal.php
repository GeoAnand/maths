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
                    <h2>Add Journal Publications</h2>
                  
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



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addjournalnew.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">      

<?php
$sq2=mysqli_query($conn,"select * from  profilejournal where fuid='".$_GET['facid']."'");
$nmR=mysqli_num_rows($sq2);
?>				           



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

<div class="col-md-5" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Add Number of Publication Rows
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
	  <th style="width:25%;">Author</th>
	  <th style="width:25%;">Title</th>
	  <th style="width:15%;">Desc</th>
	   <th style="width:15%;">Volume</th>
	   <th style="width:15%;">Page</th>
	   <th style="width:15%;">DOI</th>
	   <th style="width:15%;">DOI Link</th>
	    <th style="width:20%;">Arxiv</th>
	    <th style="width:20%;">Arxiv Link</th>
	    <th style="width:20%;">Link</th>
	    <th style="width:15%;">Year</th>
	  <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>



<!--<tr>
<td>
    <input type="text" id="intid" name="intid[]" value="<?php if(isset($rw['id']) && $rw['id']!=''){ echo $rw['id'];}else{echo "";} ?>" style="display:none;">
<textarea  id="jauthor<?php echo $x ; ?>" name="jauthor[]" class="form-control" style="height:125px;width:100%;"></textarea></td>
<td><textarea  id="jdesc<?php echo $x ; ?>" name="jdesc[]" class="form-control" style="height:125px;width:100%;"></textarea></td>
<td><textarea  id="jcitedesc<?php echo $x ; ?>" name="jcitedesc[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="volume<?php echo $x ; ?>" name="volume[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="page<?php echo $x ; ?>" name="page[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="doi<?php echo $x ; ?>" name="doi[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="doilnk<?php echo $x ; ?>" name="doilnk[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="ar<?php echo $x ; ?>" name="ar[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="arlnk<?php echo $x ; ?>" name="arlnk[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="lnk<?php echo $x ; ?>" name="lnk[]" class="form-control" style="height:125px;width:100%;"></textarea></td>

<td><textarea  id="year<?php echo $x ; ?>" name="year[]" class="form-control" style="height:125px;width:100%;"></textarea></td>



<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/seladdjournalDelete.php?id=<?php echo $rw['id']; ?>&facid=<?php echo $_GET['facid']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
</tr>-->
              
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
	
	document.location.href="<?php echo $home_path; ?>/pages/operation/addjournal.php?fid=&facid="+facname;
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
		var recRow1='<tr id="rowCount1'+rowCountR+'"><td><textarea  id="jauthor'+rowCountR+'" name="jauthor[]"  class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="jdesc'+a+'" name="jdesc[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="jcitedesc'+a+'" name="jcitedesc[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="volume'+a+'" name="volume[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="page'+a+'" name="page[]" class="form-control" style="height:125px;width:100%;"></textarea></textarea></td><td><textarea  id="doi'+a+'" name="doi[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="doilnk'+a+'" name="doilnk[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="ar'+a+'" name="ar[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="arlnk'+a+'" name="arlnk[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="lnk'+a+'" name="lnk[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td><textarea  id="year'+a+'" name="year[]" class="form-control" style="height:125px;width:100%;"></textarea></td><td style="text-align:center;"><a href="javascript:void(0);" onclick="removeRow('+rowCountR+');" name="remove['+rowCountR+']" id="remove_'+ rowCountR +'" class="deleterecord btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td></tr>';
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