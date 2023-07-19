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
                    <h2>Edit DCF</h2>
          
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
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/about/action/editdcf.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
				<input type="hidden" id="idD" name="idD" value="<?php echo $_GET['id']; ?>" >
<?php
$sql=mysqli_query($conn,"select * from dcf where id='".$_GET['id']."'");
$rw=mysqli_fetch_array($sql);
?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rw['title']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea id="content" name="content" required="required" class="form-control col-md-7 col-xs-12" style="height:120px;" ><?php echo $rw['content']; ?></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rw['photo']; ?>"
                          
                          <?php if($rw['photo']!='') { ?>
<span id="photo"><?php echo $rw['photo'];?></span>&nbsp;
<a href="<?php echo $home_path;?>/pages/about/action/deletedcf.php"  >Delete</a><br>
<?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rw['contact']; ?>">
                        </div>
                      </div>
                      
                      
                      
<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						
                           <button type="submit" class="btn btn-success">Update</button>
						   <a href="<?php echo $home_path; ?>/pages/about/viewdcf.php"><button class="btn btn-primary" type="button">View</button></a>
						   
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