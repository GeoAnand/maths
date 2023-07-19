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
                    <h2>Add Profile</h2>
          
                    <div class="clearfix"></div>
                  </div>
				 


                  <div class="x_content">
                    <br />
                   <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/master/action/addfaculty.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
	
<div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fname" name="fname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Alternative Email <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Mobile <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Profile Background <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					
                 </div>
				 <div class="col-md-6">
				 
				 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">CV Photo <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  
					  
				   <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">CV attach <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Personal Webpage link<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Award photo<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="file" id="fdesig" name="fdesig" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
					  
                 </div>
                     
<div class="col-md-12">

	<div class="form-group">
	<label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Description</label>
	<div class="col-md-10 col-sm-10 col-xs-12">
	<textarea  name="ptext" id="ptext"  class="form-control col-md-7 col-xs-12" style="height:150px;" required><?php if(isset($rqs['ptext'])) {echo $rqs['ptext'];}else{echo "";} ?></textarea>
	</div>
	</div>
 </div>					 
						<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Submit</button>
						   <a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php"><button class="btn btn-primary" type="button">VIew</button></a>
						   
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
<?php
include("../../footer.php");
?>