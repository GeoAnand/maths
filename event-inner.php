<?php include('mathheader.php'); ?>


        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Event Details</h1>
                   
                </div>
            </div>
        </div>
        
         <?php
$sq1=mysqli_query($conn,"select * from events_math where id='".$_GET['id']."' ");

$rq=mysqli_fetch_array($sq1);
?>           
       
        
        <!-- Inner Page Banner Area End Here -->
        <!-- Event Details Page Area Start Here -->
        <div class="event-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="event-details-inner">
                          
                            <h2 class="title-default-left-bold-lowhight"><a href="#">
                                <?php echo $rq['ename']; ?>
                                </a></h2>
                            <ul class="event-info-inline title-bar-sm-high1">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $rq['dat']; ?></li>
                                <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $rq['spe']; ?></li>
                            </ul>
                            
                            
                             <?php if($rq['img1']!='')  { ?>
                             <br>
                             <img src="<?php echo $download_path; ?><?php echo $rq['img1']; ?>">
                             <br>
                             <?php } ?>
                            
                              <h3 class="sidebar-title">ABSTRACT :</h3>
                            <p style="text-align:justify">
                            
<?php echo nl2br($rq['ab1']); ?>

<br><br>
<?php echo nl2br($rq['ab2']); ?>

</p>
                          
                <?php if($rq['sp1']!='')  { ?>
                <h3 class="sidebar-title">ABOUT THE SPEAKER:</h3>
                   <p style="text-align:justify">
                            
<?php echo nl2br($rq['sp1']); ?>
<br><br>
<?php echo nl2br($rq['sp2']); ?>

</p>
                                    
  <?php } else { ?>
  <br>
  <?php } ?>
                                    
                                    
                                    
                               
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                  
                                </div>
                            </div>
                           
                           
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                   
                                   <div class="eventinner">
                                       
                                       <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;<span>Event Name</span>
                                       <br>
<p><?php echo $rq['ecat']; ?></p>
                                  
                                    </div>
                                   
                                </div>
                            </div>
                           
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                   
                                   <div class="eventinner">
                                       
                                       <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;<span>Place</span>
                                       <br>
<p><?php echo $rq['place']; ?></p>
                                  
                                    </div>
                                   
                                </div>
                            </div>
                            
                            
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                   
                                   <div class="eventinner">
                                       
                                       <i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;<span>Start Time</span>
                                       <br>
<p><?php echo $rq['st']; ?></p>
                                  
                                    </div>
                                   
                                </div>
                            </div>
                            
                            
                              <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                   
                                   <div class="eventinner">
                                       
                                       <i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;<span>End Time</span>
                                       <br>
<p><?php echo $rq['et']; ?></p>
                                  
                                    </div>
                                   
                                </div>
                            </div>
                            
                            
                            
                             <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                   
                                   <div class="eventinner">
                                       
                                       <i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span>External Link</span>
                                       <br>

 <ul class="sidebar-categories">
                                        <li>
                                        
                                        
                                        <a href="<?php echo $rq['el']; ?>" target="_blank"><?php echo $rq['el']; ?></a>
                                        
                                        </li>
                                        
                                        
                                        
                                        
                                       </ul>
    
                                  
                                    </div>
                                   
                                </div>
                            </div>
                           
                           
                              <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                   
                                   <div class="eventinner">
                                       
                                       <i class="fa fa-video-camera" aria-hidden="true"></i> &nbsp;<span>PDF to Talk</span>
                                       <br>
<p>
 <ul class="sidebar-categories">
                                        <li>
                                        
                                        
                                        <a href="<?php echo $rq['img']; ?>" target="_blank"><?php echo $rq['img']; ?></a>
                                        
                                        </li>
                                        
                                        
                                        
                                        
                                       </ul>
    </p>
                                  
                                    </div>
                                   
                                </div>
                            </div>
                           
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event Details Page Area End Here -->
        <!-- Footer Area Start Here -->
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
    <!-- Select2 Js -->
    <script src="js/select2.min.js" type="text/javascript"></script>
    <!-- Nouislider Js -->
    <script src="vendor/noUiSlider/nouislider.min.js" type="text/javascript"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
</body>



</html>
