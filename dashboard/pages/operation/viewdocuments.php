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
                    <h2>Documents</h2>
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
				  
				   <!--<div class="form-group" style="float:left;">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                          <button class="btn btn-primary" type="button">Add Faculty</button>
						
                        </div>
                      </div>-->
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



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/adddocument.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">      

			           
<div class="col-md-5" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of Rows
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor" name="noauthor" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>



<div style="margin:6px 0 0 0;" class="col-md-12 tableFixHead">
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
	<tr>
	  <th style="width:50%;">Title</th>
	  <th style="width:50%;">Link</th>
	  <!--<th style="width:25%;">Link</th>-->
	  <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>

<?php
$sql="select * from  documents";
$sql1=mysqli_query($conn,$sql);
//if(mysqli_num_rows($sql1)>0){
while($rw=mysqli_fetch_array($sql1)){


?>	


		
<tr>
<td>
 <input type="text" id="intid" name="intid[]" value="<?php if(isset($rw['id']) && $rw['id']!=''){ echo $rw['id'];}else{echo "";} ?>" style="display:none;">   
    <input type="text" id="lnkname<?php echo $x ; ?>" name="lnkname[]" class="form-control" value="<?php echo $rw['lnkname'] ; ?>" style="width:100%;"  onkeypress="return pointNum(event)" /></td>
    
<td><input type="text" id="lnkl<?php echo $x ; ?>" name="lnkl[]" class="form-control" value="<?php echo $rw['lnkl'] ; ?>" style="width:100%;"  onkeypress="return pointNum(event)" /></td>

<td class='chng' style='width:45px;text-align:center;'>  <a href="<?php echo $home_path; ?>/pages/operation/action/selintdocDelete.php?id=<?php echo $rw['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
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

var rowCountR3 = 0; 
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
		var recRow1="<tr id='rowCount3"+rowCountR3+"'><td><input type='text' id='lnkname"+a+"' name='lnkname[]' class='form-control' value='' style='width:100%;' onkeypress='return pointNum(event)'/></td><td><input type='text' id='lnkl"+a+"' name='lnkl[]' class='form-control' value='' style='width:100%;' onkeypress='return pointNum(event)'/></td><td style='text-align:center;'><a href='javascript:void(0);'  onclick='removeRow3("+rowCountR3+");' class='deleterecord btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Delete</a></td></tr>";
		jQuery('#addedRowsRM').append(recRow1);
	} 	
}

function removeRow3(removeNum) {
	jQuery('#rowCount3'+removeNum).remove(); 
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
	url:'<?php echo $home_path; ?>/pages/operation/action/selintdocDelete.php',
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