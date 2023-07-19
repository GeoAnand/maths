<?php include('mathheader.php'); ?>

        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Faculty Details</h1>
                    
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Courses Page 3 Area Start Here -->
        <div class="lecturers-page-area">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"  >
                        
                       
                        <div class="sidebar" >
                           
                            <div class="sidebar-box"  id="sticky-sidebar-demo">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Quick Links</h3>
                                    <ul class="sidebar-categories">
                                        
                                        <li><a href="#ri">Areas of Interest</a></li>
                                          <li><a href="#cr"> Current Research </a></li>
                                         
                                        <li><a href="#st"> Students </a></li>
                                         
                                        <li><a href="#pub">Recent Publications</a></li>
                                        
                                        <li><a href="#te"> Teaching </a></li>
                                       
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                   </div>
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                        
                        
                        
                        
                        
                        <div class="row">
                              <?php
$sq1=mysqli_query($conn,"select * from profile_math where fuid='".$_GET['fuid']."' ");

$rq=mysqli_fetch_array($sq1);
?>           
       
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                
                                
                                 <div class="lecturers-contact-info">
                            <img src="<?php echo $download_path; ?><?php echo $rq['fcvpht']; ?>" class="img-responsive" alt="team" style="width:200px;height:230px">
                           
                          
                        </div>
                                
                                
                                
                                </div>
                                
                                  <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                
                                
                                 <div class="lecturers-contact-info">
                           
                            <h2><?php echo $rq['fname']; ?></h2>
                             <h4><?php echo $rq['fdesig']; ?></h4>
                            <p><?php echo $rq['faddr']; ?><br>
                            
                            <br>
<?php echo $rq['fedu']; ?></p>


                           
                          
                        </div>
                                
                                
                                
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                     <div class="lecturers-contact-info">
                           
                            <ul class="lecturers-contact">
                                <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<?php echo $rq['fmobile']; ?></li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;<?php echo $rq['femail']; ?></li>
                                
                                 <?php if($rq['fweblink']!='') { ?>
                                
                                 <li><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a href="<?php echo $rq['fweblink']; ?>" target="_blank">Personal Home Page</a></li>
                                 
                                  <?php } else {} ?>
                                  
                                 <?php if($rq['freslink']!='') { ?>
                                 
                                  <li><i class="fa fa-users" aria-hidden="true"></i>&nbsp;<a href="<?php echo $rq['freslink']; ?>" target="_blank">Research Group Page</a></li>
                                  
                                  <?php } else {} ?>
                            </ul>
                        </div>
                                    
                                </div> 
                            
                            
                        </div>
                        
                       
                              <h3 class="title-default-left title-bar-big-left-close" id="ri">Areas of Interest</h3>
                       
                            
                             <ul class="course-feature2">
                                 
                                   <?php
$sq11=mysqli_query($conn,"select * from profileintareas where fuid='".$_GET['fuid']."' ");
$x=0;
if(mysqli_num_rows($sq11)>0){
while($rq1=mysqli_fetch_array($sq11)){
?>             
                                 
                                 <li><?php echo $rq1['intareas']; ?></li>
                             
                             <?php } } ?>
                             </ul>
                             
                             
                                                     <h3 class="title-default-left title-bar-big-left-close" id="cr">Current Research</h3>
                                                     
             <?php
$sq12=mysqli_query($conn,"select * from  research where fuid='".$_GET['fuid']."' ");

$rq2=mysqli_fetch_array($sq12);
?>                                  

<div class="row">
    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <?php  if($rq2['fcvpht']!='')  {  ?>            
                                                     
                        <p><img src="<?php echo $download_path; ?><?php echo $rq2['fcvpht']; ?>"> </p>
                        
                        
                        
                                   <?php } else { }?>
    </div>
    
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       
                         <?php  if($rq2['fcvpht1']!='')  {  ?>            
                                                     
                        <p><img src="<?php echo $download_path; ?><?php echo $rq2['fcvpht1']; ?>"> </p>
                        
                        
                        
                                   <?php } else { }?>
                        
    </div>
    
</div>


<div class="row">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php  if($rq2['fcvpht2']!='')  {  ?>            
                                                     
                        <p><img src="<?php echo $download_path; ?><?php echo $rq2['fcvpht2']; ?>"> </p>
                        
                        
                        
                                   <?php } else { }?>
    </div>
    
     
    
</div>


                                   
                                   
                     
                        
                        
                      <!--  <ul class="course-feature2">
                           <li><b>Research Title</b><br>
High bias anomaly in YBa2Cu3O7/LaMnO3+δ/YBa2Cu3O7superconductor/ferromagnetic insulator/superconductor junctions: Evidence for a long-range superconducting proximity effect through the conduction band of a ferromagnetic insulator.</li>
</ul>-->
                             
                             <p style="text-align:justify">
                                 <?php echo $rq2['fdesc']; ?>
                                 
                             </p>
                             
                             
                             
                             
                             <!-- <h3 class="title-default-left title-bar-big-left-close" id="pb">Professional Background</h3>
                        
                            
                             <table >
                                 
                                 <thead>
                                     <tr>
                                     <td>From</td>
                                       <td>Period</td>
                                         <td>Position</td>
                                         <td>Organisation</td>
                                         </tr>
                                 </thead>
                                 
                                 <tbody>
                                     
                                     <tr><td>2007-01-01</td>
                                     <td>1 Year</td>
                                     
                                     <td>Assistant Professor</td>
                                     <td>IITM</td>
                                     </tr>
                                      <tr><td>2007-01-01</td>
                                     <td>1 Year</td>
                                     
                                     <td>Assistant Professor</td>
                                     <td>IITM</td>
                                     </tr>
                                      <tr><td>2007-01-01</td>
                                     <td>1 Year</td>
                                     
                                     <td>Assistant Professor</td>
                                     <td>IITM</td>
                                     </tr>
                                 </tbody>
                                 
                             </table>-->
                             
                             
                             
                             
                             
                             
                       
                         
                             <!-- <h3 class="title-default-left title-bar-big-left-close" id="ed">Educational Details</h3>
                        
                            
                             <table >
                                 
                                 <thead>
                                     <tr>
                                     <td>Degree</td>
                                       <td>Subject</td>
                                         <td>University</td>
                                         <td>Year</td>
                                         </tr>
                                 </thead>
                                 
                                 <tbody>
                                     
                                     <tr><td>PH.D.</td>
                                     <td>Physics</td>
                                     
                                     <td>IIT Bombay</td>
                                     <td>2017</td>
                                     </tr>
                                      <tr><td>PH.D.</td>
                                     <td>Physics</td>
                                     
                                     <td>IIT Bombay</td>
                                     <td>2017</td>
                                     </tr>
                                     
                                      <tr><td>PH.D.</td>
                                     <td>Physics</td>
                                     
                                     <td>IIT Bombay</td>
                                     <td>2017</td>
                                     </tr>
                                     
                                 </tbody>
                                 
                             </table>-->
                             
                             
                              
                       
                                                 <h3 class="title-default-left title-bar-big-left-close" id="st">Students</h3>
                                                 <h4>Current PhD Students</h4>
                        
                            
                              
                             <ul class="course-feature2">
                                   <?php
$sq112=mysqli_query($conn,"select * from profileaward where fuid='".$_GET['fuid']."' ");
$x=0;
if(mysqli_num_rows($sq112)>0){
while($rq3=mysqli_fetch_array($sq112)){
?>              
                                 
                                 
                                 <li><?php echo $rq3['yr']; ?> &nbsp;&nbsp; <?php echo $rq3['description']; ?></li>
                                 
                             
                             
                             <?php } } ?>
                             </ul>
                       
                        
                        <h3 class="title-default-left title-bar-big-left-close" id="pub">Recent Publications</h3>
                        <ul class="course-feature2">
                           
                           
          <?php
$sq1121=mysqli_query($conn,"select * from profilejournal where fuid='".$_GET['fuid']."' order by year DESC ");
$x=0;
if(mysqli_num_rows($sq1121)>0){
while($rq4=mysqli_fetch_array($sq1121)){
?>                              


<li><b><?php echo $rq4['jdesc'].". "; ?></b>

<?php if ($rq4['jauthor']!='') { ?>
<?php echo $rq4['jauthor'].". "; ?>
<?php }  else { ?>
<?php }   ?>

<?php if ($rq4['jcitedesc']!='') { ?>
<?php echo $rq4['jcitedesc'].". "; ?>
<?php }  else { ?>
<?php }   ?>

<?php if ($rq4['volume']!='') { ?>
<?php echo $rq4['volume'].". "; ?>
<?php }  else { ?>
<?php }   ?>


<?php if ($rq4['page']!='') { ?>
<?php echo $rq4['page'].". "; ?>
<?php }  else { ?>
<?php }   ?>


<?php if ($rq4['doilnk']!='') { ?>
<br>DOI:<a href="<?php echo $rq4['doilnk']; ?>" style="font-weight:bold ;">  <?php echo $rq4['doi'].". "; ?></a>
<?php }  else if ($rq4['doi']!='') { ?>
 <br><span  style="font-weight:bold ;">DOI: <?php echo $rq4['doi'].". "; ?></span>
<?php }  else { ?>
<?php  } ?>

<!--<?php if ($rq4['doi']!='') { ?>
 <br><span  style="font-weight:bold ;">DOI: <?php echo $rq4['doi'].". "; ?></span>
<?php }  else { ?>
<?php }   ?>-->

<?php if ($rq4['arlnk']!='') { ?>
<a href="<?php echo $rq4['arlnk']; ?>"> arXiv: <?php echo $rq4['arlnk']; ?></a>
<?php }  else { ?>
<?php }   ?>

<?php if ($rq4['ar']!='') { ?>
<?php echo $rq4['ar']; ?>
<?php }  else { ?>
<?php }   ?>

<?php if ($rq4['year']!='') { ?>
<?php echo $rq4['year'].". "; ?>
<?php }  else { ?>
<?php }   ?>

<?php if ($rq4['link']!='') { ?>
<br><?php echo $rq4['link'].". "; ?>
<?php }  else { ?>
<?php }   ?>
</li>


<?php } } ?>


 </ul>
 <h3 class="title-default-left title-bar-big-left-close" id="te">Teaching</h3>
                        
                             
                            <ul class="course-feature2"> 
                            
                            <?php
$sq114=mysqli_query($conn,"select * from profileexperience where fuid='".$_GET['fuid']."' ");
$x=0;
if(mysqli_num_rows($sq114)>0){
while($rq5=mysqli_fetch_array($sq114)){
?>       
                            
                            <li><?php echo $rq5['fromto']; ?> :&nbsp; <?php echo $rq5['desig']; ?></li>
                             
                            <?php } } ?>
                             
                             </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses Page 3 Area End Here -->
        <!-- Footer Area Start Here -->
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
