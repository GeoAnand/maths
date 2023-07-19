<?php include('mathheader.php'); ?>
        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Staff</h1>
                   <!-- <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Staff</li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        
        <style>
    .imgHt{
        width: 110px;
        height: 110px;
    }
</style>
        <!-- About Slider Area Start Here -->
        <div class="about-slider-area">
            <div class="container">
                <div class="row">
<?php 
$sq=mysqli_query($conn,"select * from staff ORDER BY sname ASC");
$x=0;
if(mysqli_num_rows($sq)>0){
while($rw=mysqli_fetch_array($sq)){
?>                      
 
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin: 0 0 25px 0;">
             <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rw['img']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"><?php echo $rw['prename']; ?> <?php echo $rw['sname']; ?></h3>
                                
                                
                                 <?php  
                              if($rw['sdegi']!=''){ ?>
                                <span class="item-designation"> <?php echo $rw['sdegi']; ?></span> <br>
                            <?php 
                            }
                            ?>
                            
                            
                              <?php  
                              if($rw['sphn']!=''){ ?>
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp; <?php echo $rw['sphn']; ?></span> <br>
                            <?php 
                            }
                            ?>
                            
                            
                               <?php  
                              if($rw['sdiv']!=''){ ?>
                                <span class="item-designation"><img src="img/icons8-book.png"> &nbsp; <?php echo $rw['sdiv']; ?></span> <br>
                            <?php 
                            }
                            ?>
                    <?php 
                            if($rw['semail']!=''){ ?>
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp; <?php echo $rw['semail']; ?></span><br>
                            <?php 
                            }
                            ?>
                           
                            
                           
                               
                            </div>
                        
                    </div>
                    </div>
                </div>
              </div>
   <?php } } ?>
   
            
              </div>
              
             
              
             
            </div>
        </div>
        <!-- About Slider Area End Here -->
    
          <?php include('footer.html'); ?>
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
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
</body>



</html>
