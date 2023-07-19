<?php include('mathheader.php'); ?>
        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Faculty</h1>
                  
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

    
            
                    <!-- Courses Page 2 Area Start Here -->
        <div class="courses-page-area2 lecturers-page1-area">
            <div class="container" id="inner-isotope">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="isotop-classes-tab isotop-btn">
                            <a href="#" data-filter=".fac" class="current" onclick="selCLD();">Faculty</a>
                           
                           <!-- <a href="#" data-filter=".dst"  class="dst" onclick="selCLD1();"> DST-Inspire/Ramanujam Fellow</a>-->
                            <a href="#" data-filter=".dis" class="dst"  onclick="selCLD1();">Distinguished Faculty</a>
                            <a href="#" data-filter=".ad" class="dst"  onclick="selCLD1();">Adjunct Faculty</a>
                         
                            <a href="#" data-filter=".vis" class="dst"  onclick="selCLD1();">Visiting Faculty</a>
                           <!-- <a href="#" data-filter=".medical">Medical</a>-->
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fc1">
                        <div class="isotop-classes-tab isotop-btn">
                            <a href="#" data-filter=".ag" class="current12 ">A-G</a>
                            <a href="#" data-filter=".ho"> H-O</a>
                            <a href="#" data-filter=".ps">P-R</a>
                            <a href="#" data-filter=".tz">S-Z</a>
   
                        </div>
                    </div>
                </div>
                
                
                
                 <div class="row featuredContainer">
                    
<?php
$sq11=mysqli_query($conn,"select * from faculty_math where fdivision=1 ");

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=1 AND fname like 'A%' or fname like 'B%' or fname like 'C%' or fname like 'D%' or fname like 'E%' or fname like 'F%' or fname like 'G%' ORDER BY fname ASC");

$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
    if($rq['fdivision']=='1'){
?>    

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ag" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"> <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>" ><?php echo $rq['fname']; ?></a></h3>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                             <span class="item-designation"><img src="img/icons8-book.png">&nbsp;<?php echo $rq['rai']; ?></span> <br>
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq['femail']; ?></span><br>
                                
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
 <?php 
    }  
} 
   }
   ?>                     
                </div>
                
                
                
                
                
                
                
<div class="row featuredContainer">
                    
<?php
$sq11=mysqli_query($conn,"select * from faculty_math where fdivision=1 ");

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=1 AND fname like 'H%' or fname like 'I%' or fname like 'J%' or fname like 'K%' or fname like 'L%' or fname like 'M%' or fname like 'N%' or fname like 'O%' ORDER BY fname ASC");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
    if($rq['fdivision']=='1'){
?>    

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ho" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"> <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>" ><?php echo $rq['fname']; ?></a></h3>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                             <span class="item-designation"><img src="img/icons8-book.png">&nbsp;<?php echo $rq['rai']; ?></span> <br>
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq['femail']; ?></span><br>
                                
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
 <?php 
    }
} 
   }
   ?>                     
                </div>
                
                
                
                
                
                
                
<div class="row featuredContainer">
                    
<?php
$sq11=mysqli_query($conn,"select * from faculty_math where fdivision=1 ");

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=1 AND fname like 'P%' or fname like 'Q%' or fname like 'R%' ORDER BY fname ASC");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
    if($rq['fdivision']=='1'){
?>    

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ps" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"> <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>" ><?php echo $rq['fname']; ?></a></h3>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                             <span class="item-designation"><img src="img/icons8-book.png">&nbsp;<?php echo $rq['rai']; ?></span> <br>
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq['femail']; ?></span><br>
                                
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
 <?php 
    }
} 
   }
   ?>                     
                </div>
                
                
                
                
                
 <div class="row featuredContainer">
                    
<?php
$sq11=mysqli_query($conn,"select * from faculty_math where fdivision=1 ");

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=1 AND fname like 'S%' or fname like 'T%' or fname like 'U%' or fname like 'V%' or fname like 'W%' or fname like 'X%' or fname like 'Y%' or fname like 'Z%' ORDER BY fname ASC");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
    if($rq['fdivision']=='1'){
?>    

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tz" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"> <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>" ><?php echo $rq['fname']; ?></a></h3>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                             <span class="item-designation"><img src="img/icons8-book.png">&nbsp;<?php echo $rq['rai']; ?></span> <br>
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq['femail']; ?></span><br>
                                
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
 <?php 
    }
} 
   }
   ?>                     
                </div>
                
                
                
                
                                                               
                
                
                
                
                <div class="row featuredContainer">
                    
<?php
$sq11=mysqli_query($conn,"select * from faculty_math where fdivision=1 ");


$sq1=mysqli_query($conn,"select * from profile_math where fdivision=1 ORDER BY fname ASC ");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
    if($rq['fdivision']=='1'){
?>    

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 fac" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"> <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>" ><?php echo $rq['fname']; ?></a></h3>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                             <span class="item-designation"><img src="img/icons8-book.png">&nbsp;<?php echo $rq['rai']; ?></span> <br>
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq['femail']; ?></span><br>
                                
                        
               
                         
                             
                       
                            
                           
                               
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
 <?php 
    }
        
    } 
   
   
   
   
   }?>                     
                    
                    
                    
                     
                 
                 
                  
           
                </div>
                
               <!-- <div class="row featuredContainer ">
                      <?php
//echo "select * from profile where fdivision=4 AND fuid IN('84','85') ORDER BY fname ASC   "; 
//$sq1=mysqli_query($conn,"select * from profile where fdesig IN('DST Ramanujan Fellow','DST INSPIRE Faculty') ORDER BY fname ASC   ");
$sq15=mysqli_query($conn,"select * from profile_math where fdivision=4 ORDER BY fname ASC   ");

$x=0;
if(mysqli_num_rows($sq15)>0){
while($rq5=mysqli_fetch_array($sq15)){
?> 
                    
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 dst" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq5['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <a href="faculty-inner.php?fuid=<?php echo $rq5['fuid']; ?>"><h3 class="item-title"><?php echo $rq5['fname']; ?></h3></a>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq5['fdesig']; ?></span> <br>
                      
                            
                            
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq5['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq5['femail']; ?></span><br>
                                
                                
                                
                                <?php if($rq['visit']!='') { ?>
                                
                        <span class="item-designation">Period of Visit:&nbsp;<?php echo $rq['visit']; ?></span><br>
                        
                        <?php  } else { } ?>
                        
                         
               
                         
                               
                       
                            
                           
                               
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
                  
   <?php } 
   
   
   
   
   }?>    
            
                   
                </div>-->
                
                <div class="row featuredContainer ">
                       <?php

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=2 ORDER BY fname ASC   ");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
?> 
                    
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 dis" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                               <h3 class="item-title"><a href="<?php echo $rq['fweblink']; ?>" target="_blank"><?php echo $rq['fname']; ?></a></h3>
                                
                                
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png"><?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png"><?php echo $rq['femail']; ?></span><br>
                             
                               
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
                  
   <?php } 
   
   
  
   
   }?>    
                   
                </div>
                
                 <div class="row featuredContainer ">
                       <?php

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=3 ORDER BY fname ASC   ");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
?> 
                    
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ad" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                                    
                                <!--   <?php if($rq['wla']=='') { ?>  
                                    
                                    
                                    
                              <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>"><h3 class="item-title"><?php echo $rq['fname']; ?></h3></a>
                                
                                
                                <?php } else { ?>
                                
                                
                                 <a href="<?php echo $rq['wla']; ?>" target="_blank"><h3 class="item-title"><?php echo $rq['fname']; ?></h3></a>
                                
                                
                                <?php } ?>
                                
                          
                               <span class="item-designation"><?php echo $rq['rai']; ?></span> <br>-->
                      
                            <h3 class="item-title"><?php echo $rq['fname']; ?></h3>
                            
                        
                          
                          
                          
                           <?php if($rq['rai']!='') { ?>  
                          
                            
                               <span class="item-designation"><img src="img/icons8-book.png">&nbsp;<?php echo $rq['rai']; ?></span> <br>
                          
                          
                          
                          <?php } else { } ?>
                     
               
                <?php if($rq['wla']=='') { ?>  
                                
                                <span class="item-designation"><img src="img/icons8-person-20.png">&nbsp;<a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>">Personal Page</a> </span><br>
                                
                                <?php } else { ?>
                                
                                
                                 
                                
                                <span class="item-designation"><img src="img/icons8-person-20.png">&nbsp;<a href="<?php echo $rq['wla']; ?>" target="_blank">Personal Page</a> </span><br>
                                <?php } ?>
               
               
                               
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
                  
   <?php } 
   
   
  
   
   }?>    
                
                   
                </div>
                
                
                  <div class="row featuredContainer ">
                      <?php

$sq1=mysqli_query($conn,"select * from profile_math where fdivision=4 ORDER BY fname ASC ");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
?> 
                    
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 vis" style="margin: 0 0 25px 0;">
                    
                     <div class="featured-box2 hvr-bounce-to-right">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="imgHt">
                        </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <div class="lecturers-content-wrapperss">
                                    
                                 
                                 
                                  <?php if($rq['wla']=='') { ?>  
                                    
                                    
                                   <a href="faculty-inner.php?fuid=<?php echo $rq['fuid']; ?>"><h3 class="item-title"><?php echo $rq['fname']; ?></h3></a>
                                
                                <?php } else { ?>
                                 
                                    
                               <h3 class="item-title"><?php echo $rq['fname']; ?></h3>
                                
                                <?php }?>
                          
                                <span class="item-designation"><?php echo $rq['fdesig']; ?></span> <br>
                      
                            
                            
                          
                            
                                <span class="item-designation"><img src="img/icons8-phone-20.png">&nbsp;<?php echo $rq['fmobile']; ?></span> <br>
                          
                         
                                <span class="item-designation"><img src="img/icons8-mail-20.png">&nbsp;<?php echo $rq['femail']; ?></span><br>
                                
                                 <?php if($rq['wla']=='') { ?>  
                                    
                                    
                                    
                              
                                
                                <br>
                                
                                <?php } else { ?>
                                
                                
                                 
                                
                                <span class="item-designation"><img src="img/icons8-person-20.png">&nbsp;<a href="<?php echo $rq['wla']; ?>" target="_blank">Personal Page</a> </span><br>
                                <?php } ?>
               
                                
                                <?php if($rq['visit']!='') { ?>
                                
                        <span class="item-designation">Period of Visit:&nbsp;<?php echo $rq['visit']; ?></span><br>
                        
                        <?php  } else { } ?>
                        
                         
               
                         
                               
                       
                            
                           
                               
                            </div>
                        
                    </div>
                    </div>
                </div>
                    
                    </div>
                  
   <?php } 
   
   
   
   
   }?>    
            
                   
                </div>
                
                
            </div>
        </div>
        <!-- Courses Page 2 Area End Here -->
               
            
            <?php include('footer.html'); ?>
    </div>
    
    <script>
        function selCLD(){
            $(".fc1").show();
        }
         function selCLD1(){
            $(".fc1").hide();
        }
    </script>
   
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
