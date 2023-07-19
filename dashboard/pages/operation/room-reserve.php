<?php
include("../../header.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
              
			  
			  
			  
			  <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Room Booking</h2>
          
                    <div class="clearfix"></div>
                  </div>
				 


	<?php if(isset($_GET['msg']) && $_GET['msg']=='success'){ ?>			 
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Success!</strong> Form added.
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
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addroomreserve.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
					    
					    
					    
	 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Available Room  <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">				    
  <select name="rname" id="rname" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select Room Name --</option>
<?php $sql =  "select * from addroom order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
?>

<option value="<?=$fetch['id']?>"><?=$fetch['rname']?></option>
<?php  } ?>
</select>
</div>
</div>
					    
	

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Name <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ename" name="ename" required="required" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="rdate" name="rdate" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Time From <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="timef" name="timef" required="required" class="form-control col-md-7 col-xs-12" onblur="frmtme();">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Time To <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="time" id="timet" name="timet" required="required" class="form-control col-md-7 col-xs-12"  onblur="totme();">
                        </div>
                      </div>
                    
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Submit</button>
						   <a href="<?php echo $home_path; ?>/pages/operation/viewroom.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  
			  
			  <div class="col-md-6 col-sm-6 col-xs-6 ">
			      
			       <div class="x_title">
                    <h2>Available Rooms and Status</h2>
          
                    <div class="clearfix"></div>
                  </div>
			      
			      <div style="overflow-y:scroll;height:350px">
			      
			        <table id="datatable-responsive1" class="table" cellspacing="0" >
                      <thead>
                        <tr>
                          <th style="width:25%;">Hall Name</th>
                           <th style="width:25%;">Booked Date</th>
                            <th style="width:25%;">Event Name</th>
                            
                             <th style="width:25%;">Booked By</th>
                         
                          
                          
                        </tr>
                      </thead>
                      <tbody id="tblhde">
<?php
$sql=mysqli_query($conn,"select * from roomreserve where status='1'");

$added_by=$_SESSION['user'];
while($rw=mysqli_fetch_array($sql))
   
{
  $sqlr = "select * from addroom where id='".$rw['rname']."'";
$valr = mysqli_query($conn,$sqlr);
$fetchr=mysqli_fetch_array($valr);   
    
    
?>					  
                        <tr>
                          <td><?php echo $fetchr['rname']; ?></td>
                          <td><?php echo $rw['rdate']; ?><br>
                          <?php echo $rw['timef']; ?>&nbsp; <?php echo $rw['timet']; ?>
                          </td>
                          <td><?php echo $rw['ename']; ?></td>
                          <td><?php echo $rw['added_by']; ?></td>
                        
                        </tr>
                        
       <?php } 
       
       
$sqlr1 = "select * from addroom where id NOT IN (select rname from roomreserve )";
$valr1 = mysqli_query($conn,$sqlr1);
while($fetchr1=mysqli_fetch_array($valr1))
{
?>  
    <tr>
        <td><?php echo $fetchr1['rname']; ?></td>
        <td colspan="3">There are currently no bookings for this hall</td>
    </tr>
<?php } ?>
</tbody>
                      
                      
                      
                        <tbody id="tblshw">
                             
                        </tbody>
                              
                              
                    </table>
			      
			      
			      </div>
			      
			  </div>
			  
			  
			  
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
		<script>
		function myfunc(){
			document.location.href="<?php echo $home_path; ?>/pages/operation/room-reserve.php?id=<?php echo $_GET['id']; ?>"
			
		}
		</script>
		
	
	
	
	
		<script>
	$(document).ready(function(){

	});
	
function frmtme(){
rname=$('#rname').val();
rdate=$('#rdate').val();
timef=$('#timef').val();
if(rdate==''){
    //alert("Date should not be blank.");
}else if(timef==''){
    //alert("From time should not be blank.");
}else{
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatch.php',
	data:{
	rname:rname,
	rdate:rdate,
	frmtme:'frmtme',
	timef:timef
	},
	success:function(data){
		 //alert(data);  
		if(data=='1'){
		    alert("Already exists!.");
		}else{
		    
		}
		
		/*opt=data.split('$#');
		$('#timef').val(opt[0]);
		$('#timet').val(opt[1]);*/
		
		
	}
	});
}
}


function totme(){
rname=$('#rname').val();
rdate=$('#rdate').val();
timef=$('#timef').val();
timet=$('#timet').val();

if(rdate==''){
    //alert("Date should not be blank.");
}else if(timef==''){
    //alert("From time should not be blank.");
}else{
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatch.php',
	data:{
	rname:rname,
	rdate:rdate,
    timef:timef,
    frmtme:'totme',
	timet:timet
	},
	success:function(data){
		 //alert(data);  
		if(data=='1'){
		    alert("Already exists!.");
		}else{
		    
		}
		

		
		
	}
	});
}
}


function selCHg(){
rname=$('#rname').val();
rdate=$('#rdate').val();
timef=$('#timef').val();
timet=$('#timet').val();

	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatchRESERVE.php',
	data:{
	rname:rname,
	rdate:rdate,
    timef:timef,
    frmtme:'totme',
	timet:timet
	},
	success:function(data){
		// alert(data);  
		 
		 $('#tblshw').html(data);
		 $('#tblhde').hide();
		 
		
		

		
		
	}
	});

}


</script>



		
		
<?php
include("../../footer.php");
?>