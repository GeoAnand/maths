<?php include('mathheader.php'); ?>

        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Gallery </h1>
                   
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Gallery Area 1 Start Here -->
        <div class="gallery-area1">
            <div class="container">
                <div class="row gallery-wrapper">
                    
                    
                    	 <?php                    
        $sq1=mysqli_query($conn,"select * from gallery order by id ASC ");
$x=0;

while($rq=mysqli_fetch_array($sq1))   {             
                        
?>   
                   
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 room auditoriam campus">
                        <div class="gallery-box">
                            <img src="<?php echo $downloadpath; ?><?php echo $rq['img']; ?>" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="<?php echo $rq['lnk']; ?>" target="_blank" class="zoom1"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            
                        </div>
                        <h4 style="text-align:center"><?php echo $rq['title']; ?></h4>
                    </div>
                    
                    
                    <?php } ?>
                    
                    
                </div>
            </div>
        </div>
       
         <?php include('footer.html'); ?>
        <!-- Footer Area End Here -->
    </div>
   
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
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
</body>



</html>
