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
                    <h2>Edit Events</h2>
          
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
                   <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/editevent.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
				<input type="hidden" id="idD" name="idD" value="<?php echo $_GET['id']; ?>" >
<?php
$sql=mysqli_query($conn,"select * from events_math where id='".$_GET['id']."'");
$rw=mysqli_fetch_array($sql);
?>




<div class="col-md-4">	

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Division</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php
$sq=mysqli_query($conn,"select * from events_math where id='".$_GET['id']."'");

$rq=mysqli_fetch_array($sq);

?>
                            <?php $sqlBS=mysqli_query($conn,"select * from eventcat_math order by ename ASC");?> 
                            
                         <select name="ecat" id="ecat" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">

  
<?php while($rowBS=mysqli_fetch_array($sqlBS)) { ?>
<?php if($rowBS['ename']==$rq['ecat']) { ?>
<option value="<?php echo $rowBS['ename'];?>" selected ><?php echo ucwords($rowBS['ename']);?></option>
<?php }else{ ?>
<option value="<?php echo $rowBS['ename'];?>"><?php echo ucwords($rowBS['ename']);?></option>
<?php } }  ?>
					    
</select>
						  
                        </div>
                      </div>
                      
                      
                      
                	<div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Event Type <span class="required" >*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">				    
  <select name="etype" id="etype" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="<?php echo $rq['etype'];?>"><?php echo $rq['etype'];?></option>


<option value="Upcoming Event">Upcoming Event</option>
<option value="Past Event">Past Event</option>

</select>
</div>
</div>	                   
                      
                   
                   

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Event Title <span class="required" >*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="ename" name="ename" required="required" value="<?php echo $rw['ename']; ?>" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      
                      
                           <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Image</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="file" id="img1" name="img1" accept=".png, .jpg, .jpeg" class="form-control col-md-7 col-xs-12">
						  <?php if($rw['img1']!='') { ?>
<span id="att1"><?php echo $rw['img1'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','img1');">Delete</a><br>
<?php } ?>
                        </div>
                     
                      
                      
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">PDF of Talk</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="file" id="img" name="img" accept=".pdf" class="form-control col-md-7 col-xs-12">
						  <?php if($rw['img']!='') { ?>
<span id="att1"><?php echo $rw['img'];?></span>&nbsp;
<a href="#"  onclick="selPDFDel('<?php echo $rw['id']; ?>','img');">Delete</a><br>
<?php } ?>
                        </div>
                      </div> 
                      
                      
                      
                      
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Speakers/Key Speakers 
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="spe" name="spe" value="<?php echo $rw['spe']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                        <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Date
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="dat" name="dat" value="<?php echo $rw['dat']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>  
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Abstract (paragraph1)
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="ab1" name="ab1" class="form-control col-md-7 col-xs-12"><?php echo $rw['ab1']; ?></textarea>
                        </div>
                      </div> 
                      	
                      
                      
                      
                      
                      
  </div>                    
                      
                      
                      
                      
                      
  <div class="col-md-4">
    
   
                      
                      
                        
                      
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Abstract (paragraph2)
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="ab2" name="ab2"  class="form-control col-md-7 col-xs-12"><?php echo $rw['ab2']; ?></textarea>
                        </div>
                      </div>
                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">About the Speaker (paragraph1)
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="sp1" name="sp1" class="form-control col-md-7 col-xs-12"><?php echo $rw['sp1']; ?></textarea>
                        </div>
                      </div>
    
     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">About the Speaker (paragraph2)
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="sp2" name="sp2" class="form-control col-md-7 col-xs-12"><?php echo $rw['sp2']; ?></textarea>
                        </div>
                      </div>
                      
                      
           <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Guests
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="guest" name="guest" class="form-control col-md-7 col-xs-12"><?php echo $rw['guest']; ?></textarea>
                        </div>
                      </div>           
                      
       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Place
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="place" name="place" value="<?php echo $rw['place']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
    
    </div>


					    
	<div class="col-md-4">	

                     
                      
                     
                      
                      
                     
                      
                      
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Start Time
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="st" name="st" value="<?php echo $rw['st']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                   
                      
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">End Time
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="et" name="et" value="<?php echo $rw['et']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                        
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">External Link name
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="elname" name="elname" value="<?php echo $rw['elname']; ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">External Link 
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="text" id="el" name="el" value="<?php echo $rw['el']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">References
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="ref" name="ref" class="form-control col-md-7 col-xs-12"><?php echo $rw['ref']; ?></textarea>
                        </div>
                      </div>
                      
                      
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Organizing Committee
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="oc" name="oc" class="form-control col-md-7 col-xs-12"><?php echo $rw['oc']; ?></textarea>
                        </div>
                      </div> 
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Topics
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <textarea id="top" name="top" class="form-control col-md-7 col-xs-12"><?php echo $rw['top']; ?></textarea>
                        </div>
                      </div> 
                      
                      
                      
                      
           </div>                         
                      
                      
                      
                    
                      
                      
                       
                      
                
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Update</button>
						   <a href="<?php echo $home_path; ?>/pages/operation/viewevent.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
	url:'<?php echo $home_path; ?>/pages/operation/action/selDELevent.php',
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