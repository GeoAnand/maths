<?php

include("../../header.php");

?>

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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
              
			  
			  
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Selected Journal Publications</h2>
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


                  <div class="x_content">



<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addjournal.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">                 
<div class="col-md-5" style="margin: 5px 0 25px 0;">
<div class="form-group">
<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of Rows <span class="required">*</span>
</label>
<div class="col-md-8 col-sm-8 col-xs-12">
  <input type="text" id="noauthor" name="noauthor" required="required" class="form-control col-md-7 col-xs-12"  onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php //echo $nmR; ?>" >
</div>
</div>
</div>
					  

<!--<div class="col-md-4" >
<label for="exampleInputPassword1">Number of Rows<span style="color:red;">&nbsp;*</span></label>
	<input type="text" class="form-control" name="noauthor" id="noauthor" placeholder="" onkeyup="selNoRws();" onkeypress="return pointNum(event)" value="<?php echo $nmR; ?>" >
</div>-->

<div style="margin:6px 0 0 0;" class="col-md-12 tableFixHead">
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
	<tr>
	  <th style="width:35%;">Author</th>
	  <th style="width:35%;">Description</th>
	  <th style="width:15%;">Cite desc</th>
	  <th style="width:15%;">&nbsp;</th>
	</tr>
  </thead>
  <tbody>
<?php
/* $sql=mysqli_query($conn,"select * from faculty where status='1'");
while($rw=mysqli_fetch_array($sql)){ */
?>			
<tr>
<td><textarea  id="jauthor<?php echo $x ; ?>" name="jauthor[]" class="form-control" style="height:125px;width:100%;"><?php //echo $rq['eduname'] ; ?></textarea></td>
<td><textarea  id="jdesc<?php echo $x ; ?>" name="jdesc[]" class="form-control" style="height:125px;width:100%;"><?php //echo $rq['eduname'] ; ?></textarea></td>
<td><textarea  id="jcitedesc<?php echo $x ; ?>" name="jcitedesc[]" class="form-control" style="height:125px;width:100%;"><?php //echo $rq['eduname'] ; ?></textarea></td>
<td class='chng' style='width:45px;text-align:center;vertical-align: middle;'><img class='rem' src='../../images/del.png' style='width:15px;height:15px;text-align:center;cursor:pointer;'  onclick="delSBt('<?php echo $rq['id'];?>');"></td>
</tr>
<?php /* } */ ?>                 
</tbody>
<tbody id="addedRowsRM" >

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
		var recRow1="<tr><td><textarea  id='jauthor"+a+"' name='jauthor[]' class='form-control' style='height:125px;width:100%;'></textarea></td><td><textarea  id='jdesc"+a+"' name='jdesc[]' class='form-control' style='height:125px;width:100%;'></textarea></td><td><textarea  id='jcitedesc"+a+"' name='jcitedesc[]' class='form-control' style='height:125px;width:100%;'></textarea></td><td class='chng' style='width:45px;text-align:center;vertical-align: middle;'><img class='rem' src='../../images/del.png' style='width:15px;height:15px;text-align:center;cursor:pointer;'></td></tr>";
		jQuery('#addedRowsRM').append(recRow1);
	} 	
}

</script>



<?php
include("../../footer.php");
?>