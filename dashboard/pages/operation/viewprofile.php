<?php
include("../../header.php");

include 'editaboutfac.php';





?>

 


<div class="right_col" role="main">
    <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2 style="font-size: 2.2rem;">About Faculty</h2>
              <div class="clearfix"></div>
            </div>
            <form method="POST" action="">
              <div class="col-md-6">


                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name" style="padding-top: 8px;">About &nbsp;<?php if(isset($_SESSION['name'])) {echo ucwords($_SESSION['name']);}else{echo "";} ?></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <textarea id="about1" name="about1" class="form-control col-md-7 col-xs-12" style="resize: both;width:800px;height:300px;min-width: 100px; max-width: 900px; min-height: 100px;max-height: 500px; overflow: auto;" oninput="updateHiddenInput()"><?php echo ($about1); ?></textarea>
                        <input type="hidden" id="about1_hidden" name="about1_hidden" value="<?php echo ($about1); ?>">
                    </div>
                </div>

                <div class="form-group" style="padding-top: 35px;margin-top: 100px;">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="margin-bottom:38px;">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
              
            </form>   

          </div>
        </div>
    </div>
</div>


<script>
  function updateHiddenInput() {
    var textareaValue = document.getElementById('about1').value;
    document.getElementById('about1_hidden').value = textareaValue;
  }
</script>
<?php
include("../../footer.php");
?>
