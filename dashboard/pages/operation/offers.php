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
                    <h2>Add Opportunities</h2>
          
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
					
					<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/addoffers.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
	

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required" >*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12" autofocus>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          <textarea name="article_content"></textarea>
                        </div>
                      </div>
                     
                      
<div class="form-group">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
   <button type="submit" class="btn btn-success">Submit</button>
   <a href="<?php echo $home_path; ?>/pages/operation/viewoppor.php"><button class="btn btn-primary" type="button">View</button></a>
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
			document.location.href="<?php echo $home_path; ?>/pages/operation/offers.php?id=<?php echo $_GET['id']; ?>"
			
		}
		</script>
		
		<script src="../../ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('article_content');
</script>
<?php
include("../../footer.php");

?>