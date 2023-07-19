<?php include('mathheader.php'); ?>

        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <?php 
$sqlh111=mysqli_query($conn,"select ename from eventcat_math where id='".$_GET['ename']."' ");
$rqh111=mysqli_fetch_array($sqlh111);
?>                  
                    
                 
                    <h1>Events: <?php echo $rqh111['ename']; ?></h1>
                  
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Courses Page 2 Area Start Here -->
        <div class="courses-page-area2 lecturers-page1-area" style="background-color:#fff">
            <div class="container" id="inner-isotope">
                <div class="row">
                   
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="isotop-classes-tab isotop-btn">
                            <a href="#" data-filter=".fac1" class="current">upcoming events</a>
                            <a href="#" data-filter=".fac">Past events</a>
                           
                        </div>
                        
                        
                        <div class="row featuredContainer">
                           <!--<div class="news-page-area fac1">-->
						   <div class="news-page-area positionn fac1" ">
            <div class="container-fluid">
                <div class="row">
                    
                   
                    
                    
    <?php 
$sqlh1=mysqli_query($conn,"select ename from eventcat_math where id='".$_GET['ename']."' ");
$rqh1=mysqli_fetch_array($sqlh1);
?>                  
                    
                  <!-- <div>Events: <?php echo $rqh1['ename']; ?></div>-->
                            <br>  
                    
  <?php                  
        $sq1=mysqli_query($conn,"select * from events_math where ecatid='".$_GET['ename']."' and etype='Upcoming Event' order by dat desc");
        
        
       

$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
?>                   
                            
                         <?php   if($rq['etype']=='Upcoming Event')  { ?>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                                <div class="news-box " style="word-wrap: break-word; ">
                                   
                                    <h2 class="title-default-left-bold"><?php echo substr($rq['ename'], 0, 110); 
									//echo mb_strimwidth($rq['ename'], 0, 100, "..."); 
									//$longstr = str_pad($rq['ename'], 50);
									//echo  substr($longstr, 0, 110);
									//echo $rq['ename']; ?> </h2>
                                    <ul class="title-bar-high1 news-comments">
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span><?php echo $rq['dat']; ?></span> </a></li>
                                        
                                    </ul>
                                    <p><?php //echo $rq['spe']; ?><?php echo substr($rq['spe'], 0, 90);  ?></p>
                                    <a href="event-inner.php?id=<?php echo $rq['id']; ?>" class="default-big-btn">Read More</a>
                                </div>
                            </div>
                           
     <?php } } } else { ?>     
     
     
               <p>There are no upcoming events.</p>
               
               <?php } ?>
                  
                    
                    </div></div>
                        </div></div>
                         
                         
                         
                          <div class="row featuredContainer">
                     
                     
                    
                      <div class="news-page-area fac">
            <div class="container-fluid">
                <div class="row">
<?php 
$sqlh=mysqli_query($conn,"select ename from eventcat_math where id='".$_GET['ename']."' ");
$rqh=mysqli_fetch_array($sqlh);
?>                  
                    
                  <!-- <div>Events: <?php echo $rqh['ename']; ?></div>-->
                            <br>  
                    
  <?php                  
        $sq11=mysqli_query($conn,"select * from events_math where ecatid='".$_GET['ename']."' and etype='Past Event' order by dat desc");
        
        
        

$x=0;
if(mysqli_num_rows($sq11)>0){
while($rq1=mysqli_fetch_array($sq11)){
?>             
                   
                           
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="news-box">
                                   
                                    <h2 class="title-default-left-bold"><a href="#"><?php echo substr($rq1['ename'], 0, 100);  ?></a></h2>
                                    <ul class="title-bar-high1 news-comments">
                                        <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span><?php echo $rq1['dat']; ?></span> </a></li>
                                        
                                    </ul>
                                    <p><?php //echo $rq1['spe']; ?><?php echo substr($rq1['spe'], 0, 82);  ?></p>
                                    <a href="event-inner.php?id=<?php echo $rq1['id']; ?>" class="default-big-btn">Read More</a>
                                </div>
                            </div>
                           
     <?php } } ?>                      
                    
               
                </div>
                <br>
                <br>
                
                 
                
            </div>
        </div>
                  
     
     
     
                   
                </div>
                        
                        
                        
                    </div>
                </div>
              
                
                
                
               
                
                
                
            </div>
        </div>
        <!-- Courses Page 2 Area End Here -->
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
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
</body>



</html>
