<?php include('mathheader.php'); ?>
        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Reset Password</h1>
                   <!-- <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Contact</li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Contact Us Page 1 Area Start Here -->
        <div class="contact-us-page1-area">
            <div class="container">
                <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="">&nbsp;</div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
                      
<form id="from1" name="from1" enctype="multipart/form-data" action="resetpasssbt.php" method="post" class="" style=""  autocomplete="off">
    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 seme7   " style="position: absolute; left: 0px; top: -71px;">   
<div>
<h3 class="sidebar-title">Reset Password</h3>
</div>
<table class="" border="0" style="border:none;" >
<tbody id="studentlistbyyear">
<tr> 
<td style="color:#000;">New Password</td>
<td>
 <input type="text" id="resetid" name="resetid" value="<?php echo $_GET['id']; ?>" style="display:none;"/>   
    <input type="password" id="resetnpass" name="resetnpass" class="form-control" required /></td>
</tr>
<tr> 
<td style="color:#000;">Confirm Password</td>
<td><input type="password" id="resetcpass" name="resetcpass" class="form-control" onblur="selpass();" required /></td>
</tr>
<tr> 
<td>&nbsp;</td>
<td>	<input type="submit" value="Submit" name="submit" id="submit" class="view-all-primary-btn"></td>
</tr>
</tbody>
</table>
</div>
</form>
				


                        
                    </div>
                </div>
            </div>
           
        </div>
        
        
<script>
function selpass(){
    npassword=$("#resetnpass").val();
    cpassword=$("#resetcpass").val();

    if(npassword!=cpassword){
        alert("Password does not match.");
        $("#cpassword").val('');
    }else{
        
    }
}
</script>
        <!-- Contact Us Page 1 Area End Here -->
        <!-- Footer Area Start Here -->
        <footer style="margin: 185px 0 0px 0;">
          
            
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <p>&copy; Copyright © 2023 Physics.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End Here -->
    </div>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- jquery-->
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="js/wow.min.js"></script>
    <!-- Nivo slider js -->
    <script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="vendor/slider/home.js" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="js/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
</body>



</html>
