<?php
include("../../header.php");
include 'edithodcontent.php';
?>

<div class="right_col" role="main">
      <div class="page-title">
            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                        <div class="x_title">
                              <h2 style="font-size: 2.2rem;">Message From HOD</h2>
                              <div class="clearfix"></div>
                        </div>
                        <div class="col-md-6">
                              <form method="POST" action="">

                                    <div class="form-group" >
                                          <label class="control-label col-md-2 col-sm-4 col-xs-12" for="last-name" >Edit HOD Content </label>
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                                <textarea id="hcontent" name="hcontent" class="form-control col-md-7 col-xs-12" style="resize: both;min-width: 100px; max-width: 500px; min-height: 100px;max-height: 300px; overflow: auto;width:500px;height:150px;" oninput="updateHiddenInput()"><?php echo ($hcontent); ?></textarea>
                                                <input type="hidden" id="hcontent_hidden" name="hcontent_hidden" value="">
                                          </div>
                                    </div>


                                    <div class="form-group" >
                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                                                <button type="submit" class="btn btn-success">Submit</button>
                                          </div>
                                    </div>
                              </form>
                        </div>

                        <div class="col-md-6">
                              <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group" >
                                          <label class="control-label col-md-2 col-sm-4 col-xs-12" for="last-name">Image</label>
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" id="himg" name="himg" accept=".png, .jpg, .jpeg" class="form-control col-md-7 col-xs-12">
                                                <?php
                                                // Existing code for fetching and updating the image

                                                if (!empty($himg)) {
                                                      echo '<p style="position: absolute;margin-top: 37px;">Existing Image: ' . $himg . '</p>';
                                                      echo '<img src="http://localhost/maths-new/img/' . $himg . '" alt="Faculty Image" style="position: absolute;width: 200px;height:200px;">';
                                                } else {
                                                      echo '<p style="position: absolute;margin-top: 37px;">No existing image found.</p>';
                                                }
                                                ?>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                                                <button type="submit" class="btn btn-success">Submit</button>
                                          </div>
                                    </div>
                        </div>

                  </div>
            </div>
      </div>
</div>
<script>
      function updateHiddenInput() {
            var textareaValue = document.getElementById('hcontent').value;
            document.getElementById('hcontent').value = textareaValue;
      }
</script>



<?php
include("../../footer.php");
?>