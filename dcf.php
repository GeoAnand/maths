<?php include('mathheader.php'); ?>

        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>DCF</h1>
                    <!--<ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Opportunities</li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Courses Page 3 Area Start Here -->
        <div class="lecturers-page-area">
            <div class="container" >
                <div class="row">
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
<?php 
$sq=mysqli_query($conn,"select * from dcf");
$x=0;
if(mysqli_num_rows($sq)>0){
while($rw=mysqli_fetch_array($sq)){
?>   

    <h3 style="color:#7f241e"><?php echo $rw['title']; ?></h3>
    
    <div class="row">
   <?php if($rw['photo']!=''){ ?>       
        <div class="col-md-8">
            <p style="text-align:justify;"><?php echo $rw['content']; ?>

</p>
        </div>
      
         <div class="col-md-4">
             <img src="dashboard/download/<?php echo $rw['photo']; ?>"/>
         </div>
         <?php }else{ ?>
         <div class="col-md-12">
            <p style="text-align:justify;"><?php echo $rw['content']; ?>

</p>
        </div>
         <?php } ?>
    </div>
    
   

<br>
    
<h4 style="color:#7f241e">
    Contact : &nbsp;</h4>
    <?php echo $rw['contact']; ?>

         
         
         
                    
                  
<?php } }?>               
                        
                    
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses Page 3 Area End Here -->
        <!-- Footer Area Start Here -->
         <footer>
            <!--<div class="footer-area-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <a href="index.html"><img class="img-responsive" src="img/iit-logo.png" alt="logo" style="width:50px;"></a>
                                <div class="footer-about">
                                    <p>Praesent vel rutrum purus. Nam vel dui eu sus duis dignissim dignissim. Suspenetey disse at ros tecongueconsequat.Fusce sit amet rna feugiat.</p>
                                </div>
                                <ul class="footer-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Featured Links</h3>
                                <ul class="featured-links">
                                    <li>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">People</a></li>
                                            <li><a href="#">Student</a></li>
                                            <li><a href="#">Research</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="#">Resources</a></li>
                                            <li><a href="#">Program</a></li>
                                           <li><a href="#">Contact</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Information</h3>
                                <ul class="corporate-address">
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Phone(01)800433633.html"> (01) 800 433 633 </a></li>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i>info@physics.com</li>
                                </ul>
                                <div class="newsletter-area">
                                    <h3>Newsletter</h3>
                                    <div class="input-group stylish-input-group">
                                        <input type="text" placeholder="Enter your e-mail here" class="form-control">
                                        <span class="input-group-addon">
                                                <button type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>  
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Flickr Photos</h3>
                                <ul class="flickr-photos">
                                    <li>
                                        <a href="#"><img class="img-responsive" src="img/footer/1.jpg" alt="flickr"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img class="img-responsive" src="img/footer/2.jpg" alt="flickr"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img class="img-responsive" src="img/footer/3.jpg" alt="flickr"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img class="img-responsive" src="img/footer/4.jpg" alt="flickr"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img class="img-responsive" src="img/footer/5.jpg" alt="flickr"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img class="img-responsive" src="img/footer/6.jpg" alt="flickr"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            
            
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <p>&copy; Copyright © 2022 Department of Physics, IITM.<!--<a target="_blank" href="#" rel="nofollow"> RadiusTheme</a>--></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <!--<ul class="payment-method">
                                <li>
                                    <a href="#"><img alt="payment-method" src="img/payment-method1.jpg"></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="payment-method" src="img/payment-method2.jpg"></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="payment-method" src="img/payment-method3.jpg"></a>
                                </li>
                                <li>
                                    <a href="#"><img alt="payment-method" src="img/payment-method4.jpg"></a>
                                </li>
                            </ul>-->
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
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/sti.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    
		    
		      var winWidth = $( window ).width();
    if ( winWidth > 767 ) {
		    
			$('#sticky-sidebar-demo').stickySidebar({
				containerSelector: '.container',
				innerWrapperClass: 'sidebar-box-inner',
				topSpacing: 25
			});
			
			
    }
			
		});
		
		
	/*	$( document ).scroll( function () {
    var winWidth = $( window ).width();
    if ( winWidth < 767 ) {
        $( '#sticky-sidebar-demo' ).css( "position", "initial!important" );
    }
} );*/
	</script>
</body>



</html>
