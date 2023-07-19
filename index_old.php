<html class="no-js" lang="">
<?php include('config.php'); ?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MATHS IITM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen" />
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="css/hover-min.css">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="css/reImageGrid.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernizr Js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
    
    <style>
   #preloader {
  background: #7f241e url('img/favicon.png') no-repeat scroll center center;
  height: 100%;
  left: 0;
  overflow: visible;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 9999999;
}
    
        .news-alerts {
  width: 100%;
  height: 380px;
  padding: 15px;
  overflow: hidden;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow:0 2px 2px rgb(215 168 78);
}

.news-alerts ul {
  list-style: none;
  margin: 0;
  padding: 0;
  position: relative;
}

.news-alerts ul li {
  padding: 10px 0px;
}

.news-alerts ul li a {
  color: #000;
  text-decoration: none;
}

.news-alerts ul li a:hover {
  color: #333;
  text-decoration: underline;
}


.fa.pull-right {
    margin-left: 0.3em;
}
.m-r {
    margin-right: 15px;
}
.text-success {
    color: #92cf5c;
}
.fa-flip-horizontal {
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=0,mirror=1);
    -webkit-transform: scale(-1,1);
    -moz-transform: scale(-1,1);
    -ms-transform: scale(-1,1);
    -o-transform: scale(-1,1);
    transform: scale(-1,1);
}
.pull-right {
    float: right;
}
.fa-2x {
    font-size: 2em;
}
.fa {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.text-success {
    color: #3c763d;
}

.fa-bullhorn:before {
    content: "\f0a1";
}



        
    </style>
</head>
<?php
$rq=mysqli_fetch_array(mysqli_query($conn,"select MAX(yr)AS yr from iddd "));
$rq1=mysqli_fetch_array(mysqli_query($conn,"select MAX(yr)AS yr from student_math where deg='1' "));
$rq1yr=$rq1['yr'];

$rq2=mysqli_fetch_array(mysqli_query($conn,"select MAX(yr)AS yr from student_math where deg='2'  "));

$rq3=mysqli_fetch_array(mysqli_query($conn,"select  MAX(yr)AS yr from 	student_math where deg='3'  "));

$rq4=mysqli_fetch_array(mysqli_query($conn,"select  MAX(yr)AS yr from 	student_math where deg='4' "));

$rq5=mysqli_fetch_array(mysqli_query($conn,"select  MAX(yr)AS yr from 	student_math where deg='5' "));

//echo "select  MAX(alumniyear)AS yr,id from alumniyear group by alumniyear";
$rq51=mysqli_fetch_array(mysqli_query($conn,"select  MAX(alumniyear)AS yr from alumniyear "));
//echo "select* from alumniyear where year='".$rq51['yr']."'";
$rq52=mysqli_fetch_array(mysqli_query($conn,"select* from alumniyear where alumniyear='".$rq51['yr']."'"));

$s1q3=mysqli_query($conn,"select MAX(alumniyear)AS yd,id from alumniyear");
//$sqc=mysqli_query($conn,"SELECT CAST(alumniyear AS UNSIGNED),alumniyear,id FROM alumniyear order by alumniyear DESC");
$r1q3=mysqli_fetch_array($s1q3);

?>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        
        <header>
            <div id="header1" class="header2-area">
                
              
                <div class="main-menu-area bg-primary" id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="logo-area">
                                    <a href="index.php"><img class="img-responsive" src="img/iit-logo.png" alt="logo" style="width: 100px;"></a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <nav id="desktop-nav">
                                     <ul>
                                        <li class="<?php echo $abt; ?>"><a href="index.php">Home</a> </li>
                                        
                                         
                                         
                                            <!-- <li class="has-child-menu1 <?php echo $abt1; ?>"><a>Research</a>
                                            <ul>
                                             <li><a href="research-area.php">Research Area</a></li>
                                             
                                             <li><a href="center.php">Centers</a></li>
                                           
                                            
                                            </ul>
                                        </li> -->

                            <li class="has-child-menu1 <?php echo $abt2; ?>"><a>People</a>
                                            <ul>
                                             <li class="has-child-menu">
                                                <a href="#">Faculty</a>
                                             <ul class="thired-level">
                                                        <li><a href="faculty.php">Faculty</a></li>
                                                        <li> <a href="#">Inspire Faculty</a></li>
                                                         <li> <a href="#">Visiting Faculty</a></li>
                                                          <li>  <a href="#">Retired Faculty</a></li>
                                                           <!-- <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D</a></li>
                                                           <li><a href="iddd.php?yr=<?php echo $rq['yr']; ?>&deg=6">Interdisciplinary Dual Degree Programs</a></li> -->
                                                    </ul> 
                                            </li>
                                            <li><a href="postdoc.php">Post Doc</a></li>
                                            <li><a href="#">Visitors</a></li>
                                            <li class="has-child-menu"><a href="#">Students</a>
                                                    <ul class="thired-level">
                                                        <!-- <li><a href="btech.php?yr=<?php echo $rq1yr; ?>&deg=1">Engineering Physics</a></li>
                                                        <li> <a href="btech.php?yr=<?php echo $rq2['yr']; ?>&deg=2">Dual Degree Program BS & MS</a></li>
                                                         <li> <a href="btech.php?yr=<?php echo $rq3['yr']; ?>&deg=3">M.Tech: Functional Materials and Nano technology</a></li> -->
                                                          <li>  <a href="btech.php?yr=<?php echo $rq4['yr']; ?>&deg=4">M.Sc.</a></li>
                                                           <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D</a></li>
                                                           <li><a href="iddd.php?yr=<?php echo $rq['yr']; ?>&deg=6">M.Tech</a></li>
                                                    </ul>
                                                </li>
                                            <li><a href="staff.php">Staff</a></li>                                                
                                                
                                                <!-- <li class="has-child-menu"><a href="#">Students</a>
                                                    <ul class="thired-level">
                                                        <li><a href="btech.php?yr=<?php echo $rq1yr; ?>&deg=1">Engineering Physics</a></li>
                                                        <li> <a href="btech.php?yr=<?php echo $rq2['yr']; ?>&deg=2">Dual Degree Program BS & MS</a></li>
                                                         <li> <a href="btech.php?yr=<?php echo $rq3['yr']; ?>&deg=3">M.Tech: Functional Materials and Nano technology</a></li>
                                                          <li>  <a href="btech.php?yr=<?php echo $rq4['yr']; ?>&deg=4">M.Sc.</a></li>
                                                           <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D</a></li>
                                                           <li><a href="iddd.php?yr=<?php echo $rq['yr']; ?>&deg=6">Interdisciplinary Dual Degree Programs</a></li>
                                                    </ul>
                                                </li> -->
<?php 

?>
                                                <!-- <li><a href="alumni.php?year=<?php echo $rq52['id']; ?>">Alumni</a></li>
                                                </li> -->
                                            </ul>
                                        </li>
                                        
                                         <li class="has-child-menu1 <?php echo $abt3; ?>"><a >Academics</a>
                                           <ul>
                                           <li class="has-child-menu"><a href="#">Programs</a>
                                                    <ul class="thired-level">
                                                          <li>  <a href="btech.php?yr=<?php echo $rq4['yr']; ?>&deg=4">M.Sc.</a></li>
                                                           <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D</a></li>
                                                           <li><a href="iddd.php?yr=<?php echo $rq['yr']; ?>&deg=6">M.Tech</a></li>
                                                    </ul>
                                            </li>
                                            <li class="has-child-menu"><a href="#">Courses</a>
                                                    <ul class="thired-level">
                                                          <li>  <a href="btech.php?yr=<?php echo $rq4['yr']; ?>&deg=4">Other Courses</a></li>
                                                           <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D Admission</a></li>
                                                           <!-- <li><a href="iddd.php?yr=<?php echo $rq['yr']; ?>&deg=6">M.Tech</a></li> -->
                                                    </ul>
                                            </li>
                                                <li><a href="program-btech-new.php">Timetable</a></li>
                                                <li><a href="program-dual-new.php">Academic Rules</a></li>
                                                <!-- <li><a href="program-mtech-new.php">M.Tech: Functional Materials and Nano technology</a></li>
                                                <li><a href="program-msc-new.php">M.Sc.</a></li>
                                                <li><a href="program-phd-new.php">Ph.D</a></li>
                                                <li><a href="program-interd-new.php">Interdisciplinary Dual Degree Programs</a></li> -->
                                                
                                            </ul>
                                        </li>
                                        
                                        <li class="has-child-menu1 <?php echo $abt1; ?>"><a>Research</a>
                                            <ul>
                                             <li><a href="research-area.php">Research Area</a></li>
                                             <li><a href="center.php">Publications</a></li>
                                             <li><a href="center.php">Books by Faculty</a></li>
                                             <li><a href="center.php">Awards And Recognitions</a></li>
                                           
                                            
                                            </ul>
                                        </li>

                                          <!-- <li class="<?php echo $abt4; ?>"><a href="committee.php">committees</a> </li> -->
                                        
                                        <!--<li><a href="event.php?ename=1">Events</a>
                                           
                                        </li>-->
                                        
                                          <li class="has-child-menu1 <?php echo $abt5; ?>"><a>News & Events</a>
                                            <ul>
                                            <li class="has-child-menu"><a href="#">Events</a>
                                                    <ul class="thired-level">
                                                          <li>  <a href="event.php?ename=1">Colloquim</a></li>
                                                           <li> <a href="event.php?ename=2">Conferences</a></li>
                                                           <li><a href="event.php?ename=3">Algebra Seminar</a></li>
                                                           <li><a href="event.php?ename=4">Discrete Mathematics Seminar</a></li>
                                                           <li><a href="event.php?ename=5">In House Symposium</a></li>
                                                           <li><a href="event.php?ename=6">Student Seminar</a></li>
                                                           <li><a href="event.php?ename=7">Forays</a></li>
                                                           <li><a href="event.php?ename=8">NSMA</a></li>
                                                           <li><a href="event.php?ename=9">Geomentry & Toplogy Seminar</a></li>
                                                    </ul>
                                            </li>
                                             <li><a href="event.php?ename=1">News</a></li>
                                             
                                             <!-- <li><a href="event.php?ename=2">Conferences</a></li>
                                             
                                             <li><a href="event.php?ename=3">Seminars</a></li>
                                             
                                             <li><a href="event.php?ename=5">Journal Clubs</a></li>
                                             
                                             <li><a href="event.php?ename=6">In-house Symposia</a></li>
                                             <li><a href="event.php?ename=7">Outreach</a></li>
											  <li><a href="https://physics.iitm.ac.in/~cvkmind/student_activities/" target="_blank">Student Activities</a></li> -->
                                           
                                            
                                            </ul>
                                        </li>
                                        
                                        
                                        <!-- <li class="<?php echo $abt6; ?>"><a href="oppor.php">Opportunities</a>
                                        </li> -->

                                        <li class="has-child-menu1 <?php echo $abt1; ?>"><a>Careers</a>
                                            <ul>
                                             <li><a href="research-area.php">Faculty Positions</a></li>
                                             <li><a href="center.php">Project Positions</a></li>
                                             <li><a href="center.php">Staff Positions</a></li>                                            
                                            </ul>
                                        </li>

                                        <li class="has-child-menu1 <?php echo $abt7; ?>"><a >Resources</a>
                                              <ul>
                                                  
                                                   <!-- <li><a href="central-facilities.php">Central Facilities</a></li> -->
                                                <li><a href="links.php">Links</a></li>
                                                <li><a href="document.php">Documents</a></li>
                                                
                                               
                                                <li><a href="gallery.php">Gallery</a></li>
                                                <li><a href="gallery.php">Videos</a></li>
                                                <!-- <li><a href="irf.php">Incident Reporting</a></li>
                                                
                                                 <li><a href="dashboard/" target="_blank">Faculty/Staff Section</a></li> -->
                                                 
                                                
                                            </ul>
                                        </li>

                                    <li class="<?php echo $abt8; ?>"><a href="contact.php">Contact</a>
                                           
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                      <ul>
                                        <li class="active"><a href="index.php">Home</a> </li>
                                        
                                         
                                         
                                            <li class="has-child-menu1"><a>Research</a>
                                            <ul>
                                             <li><a href="research-area.php">Research Area</a></li>
                                             
                                             <li><a href="center.php">Centers</a></li>
                                           
                                            
                                            </ul>
                                        </li>
                                        
                                         <li class="has-child-menu1"><a>People</a>
                                            <ul>
                                             <li><a href="faculty.php">Faculty</a></li>
                                             
                                             <li><a href="hod.php">Current & Former HoDs</a></li>
                                              <li><a href="staff.php">Staff</a></li>
                                             <li><a href="postdoc.php">Post Doctoral Fellows</a></li>
                                                
                                                
                                                <li class="has-child-menu"><a href="#">Students</a>
                                                    <ul class="thired-level">
                                                        <li><a href="btech.php?yr=<?php echo $rq1['yr']; ?>&deg=1">Engineering Physics</a></li>
                                                        <li> <a href="btech.php?yr=<?php echo $rq2['yr']; ?>&deg=2">Dual Degree Program BS & MS</a></li>
                                                         <li> <a href="btech.php?yr=<?php echo $rq3['yr']; ?>&deg=3">M.Tech: Functional Materials and Nano technology</a></li>
                                                          <li>  <a href="btech.php?yr=<?php echo $rq4['yr']; ?>&deg=4">M.Sc.</a></li>
                                                           <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D</a></li>
                                                           <li><a href="iddd.php?yr=<?php echo $rq['yr']; ?>&deg=6">Interdisciplinary Dual Degree Programs</a></li>
                                                    </ul>
                                                </li>
                                                <?php 
$sq3=mysqli_query($conn,"select MAX(alumniyear)AS yd,id from alumniyear");
$rq3=mysqli_fetch_array($sq3);
?>
                                                <li><a href="alumni.php?year=<?php echo $rq52['id']; ?>">Alumni</a></li>
                                                </li>
                                            </ul>
                                        </li>
                                         
                                         <li class="has-child-menu1"><a >Academics</a>
                                           <ul>
                                                <li><a href="program-btech-new.php">Engineering Physics</a></li>
                                                <li><a href="program-dual-new.php">Dual Degree Program BS & MS</a></li>
                                                <li><a href="program-mtech-new.php">M.Tech: Functional Materials and Nano technology</a></li>
                                                <li><a href="program-msc-new.php">M.Sc.</a></li>
                                                <li><a href="program-phd-new.php">Ph.D</a></li>
                                                <li><a href="program-interd-new.php">Interdisciplinary Dual Degree Programs</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                          <li><a href="committee.php">committees</a> </li>
                                        
                                      <!--  <li><a href="event.php?ename=1">Events</a>
                                           
                                        </li>-->
                                        
                                          <li class="has-child-menu1"><a>Events</a>
                                            <ul>
                                             <li><a href="event.php?ename=1">Bramhagupta Colloquium</a></li>
                                             
                                             <li><a href="event.php?ename=2">Conferences</a></li>
                                             
                                             <li><a href="event.php?ename=3">Seminars</a></li>
                                             
                                             <li><a href="event.php?ename=5">Journal Clubs</a></li>
                                             
                                             <li><a href="event.php?ename=6">In-house Symposia</a></li>
                                             <li><a href="event.php?ename=7">Outreach</a></li>
											 <li><a href="https://physics.iitm.ac.in/~cvkmind/student_activities/" target="_blank">Students Activities</a></li>
                                           
                                            
                                            </ul>
                                        </li>
                                        
                                        
                                        <li><a href="oppor.php">Opportunities</a>
                                        </li>
                                        
 
                                        <li class="has-child-menu1"><a >Resources</a>
                                              <ul>
                                                  
                                                   <li><a href="central-facilities.php">Central Facilities</a></li>
                                                <li><a href="links.php">Links</a></li>
                                                <li><a href="document.php">Documents</a></li>
                                                
                                               
                                                <li><a href="gallery.php">Gallery</a></li>
                                                
                                                 <li><a href="dashboard/" target="_blank">Faculty/Staff Section</a></li>
                                                
                                            </ul>
                                        </li>

                                    <li><a href="contact.php">Contact</a>
                                           
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
        
        
        <!-- Header Area End Here -->
               <br>
        <br>
        <br><br>
        <br>
        
                <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1 style="text-align:center;" class="brd-header">Department of Mathematics</h1>
                    <ul style="text-align:center;">
                        
                        <li style="font-size:25px;">Indian Institute Of Technology Madras , Chennai</li>
                    </ul>
                </div>
            </div>
        </div>
 
        <!-- Slider 1 Area Start Here -->

        
        <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
        
        
        <!-- <div class="slider1-area index1">
            <div class="bend niceties preview-1">
                
                <div id="ensign-nivoslider-3" class="slides">
                    
                      <?php

$sq1=mysqli_query($conn,"select * from slider  ORDER BY ono ASC   ");
$x=0;
if(mysqli_num_rows($sq1)>0){
while($rq=mysqli_fetch_array($sq1)){
?> 
                    <img src="<?php echo $download_path; ?><?php echo $rq['img']; ?>" alt="slider" title="#slider-direction-1" />
                   
                <?php } } ?>
                </div>
                
                
              
            </div>
        </div> -->
        
        
        </div>
        
        
        
        
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            
           <h3 class="title-default-left wow fadeIn" style="text-align:center;    margin-top:15px;margin-bottom:0px;border:1px solid #ccc;box-shadow:0px 2px 3px rgb(215 168 78);" data-wow-duration="1s" data-wow-delay=".2s">Important Announcement </h3>
                
            
            
            <div class="news-alerts holder">
                
                 
  <ul id="news-alerts" class="news-alert-list">
      
                      <div class="row">
<?php 
$sq=mysqli_query($conn,"select * from announ ORDER BY ono ASC");
$x=0;
if(mysqli_num_rows($sq)>0){
while($rw=mysqli_fetch_array($sq)){
?>                      
 
      
      
    <li style="padding-left:10px"><div style="color:#7f241e;"><i class=" fa fa-bullhorn fa-flip-horizontal fa-2x text-success "></i>&nbsp;<?php echo $rw['title']; ?></div>
    
    <div>
	
	<a > <?php echo $rw['des']; ?></a>
    <?php if( $rw['pdf']!='')  {?>
    
    <a href="<?php echo $download_path; ?><?php echo $rw['pdf']; ?>" target="_blank" style="color:#7f241e;"> Pdf</a>
    
    <?php } else  { }?>
   
     <?php if( $rw['link']!='')  {?>
    
    <a href="<?php echo $rw['link']; ?>" target="_blank" style="color:#7f241e;"> Link</a>
    
    <?php } else  { }?>
    
	</div>
    </li>
    
    
    
    
    
    <?php } }?>
  </ul>
</div>

   
        </div>
        
        
        
        </div>
        </div>
        
        
        <!-- Service 1 Area End Here -->
        <!-- About 1 Area Start Here -->
        <div class="about1-area">
            <div class="container">
                <?php 
$sq=mysqli_query($conn,"select * from about");
$x=0;
if(mysqli_num_rows($sq)>0){
while($rw=mysqli_fetch_array($sq)){
?>   
                
                <h2 class="title-default-left wow fadeIn" style="text-align:center" data-wow-duration="1s" data-wow-delay=".2s"><?php echo $rw['title']; ?></h2>
                <p class="about-sub-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s" style="font-size:16px;text-align:justify;font-weight:bold;"><?php echo $rw['des']; ?>
</p>

<?php } }?>
            </div>
        </div>
       
        <!-- Lecturers Area End Here -->
        <!-- News and Event Area Start Here -->
        <div class="news-event-area">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news-inner-area">
                        <h2 class="title-default-left">Latest News/Updates</h2>
                        <ul class="news-wrapper" style="height: 573px;
    overflow-y: scroll;">
<?php 
$sq1=mysqli_query($conn,"select * from profilejournal where added_on between date_sub(now(),INTERVAL 1 WEEK) and now();");
$nmd1=mysqli_num_rows($sq1);

if($nmd1>0){
$sq2="select * from profilejournal where added_on between date_sub(now(),INTERVAL 1 WEEK) and now();";
}else{
$sq2="select * from profilejournal order by id DESC LIMIT 0,3";    
}
//echo $sq2;
$sq=mysqli_query($conn,$sq2);
while($rq=mysqli_fetch_array($sq)){
?>
                        <li>
                               
                                <div class="news-content-holder">
                                
                                                  
                               <p><span style="font-size:18px;font-weight: 500;"><?php echo $rq['jdesc']; ?></span><br> <?php echo $rq['jauthor']; ?>,
                               
                               <?php if($rq['volume']!='') { ?> 
                               <?php echo $rq['volume']; ?>,
                               <?php } ?>
                               
                               
                               <?php if($rq['jcitedesc']!='') { ?> 
                               <?php echo $rq['jcitedesc']; ?>,
                               <?php } ?>
                               
                               <?php if($rq['page']!='') { ?> 
                               <?php echo $rq['page']; ?>
                               <?php } ?>
                               
                               
                              
                               <br> 
                                <?php if($rq['doilnk']!='') { ?>
                               DOI: <?php echo $rq['doilnk']; ?>
                                <?php } ?>
                                 <?php if($rq['arlnk']!='') { ?>
                               DOI: <?php echo $rq['arlnk']; ?>
                                <?php } ?>
                                       </p>
                                </div>
                               
                                
                            </li> 
<?php } ?>                           
                          
                            
                            
                            
                        </ul>
                     
                    </div> -->
                     
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 event-inner-area">
                        
                        <h2 class="title-default-left">Upcoming Events</h2>
                        
                        
                        <ul class="event-wrapper" style="height: 573px;
    overflow-y: scroll;">
<?php  
//echo "select * from events order by id DESC LIMIT 0,3";
$sq=mysqli_query($conn,"select * from events where etype='Upcoming Event' order by id DESC LIMIT 0,3"); 
$nmd=mysqli_num_rows($sq);
while($rw=mysqli_fetch_array($sq)){
    $dd=explode('-',$rw['dat']);
    $dd1=date('F', strtotime($rw['dat'])); //June, 2017
	$dt=date('Y-m-d');
if($rw['dat'] < $dt){	
$sql1="UPDATE events SET ";
$sql1=$sql1."etype='Past Event'";
$sql1=$sql1." where id='".$rw['id']."'";
mysqli_query($conn,$sql1);
}
if($nmd ==1){
	$out='<div style="margin-top:245px;">&nbsp;</div>';
}else if($nmd ==2){
	$out='<div style="margin-top:100px;">&nbsp;</div>';
}else{
	$out='';
}
?>
<li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
<div class="event-calender-wrapper">
    <div class="event-calender-holder">
        <h3><?php echo $dd[2]; ?></h3>
        <p><?php echo $dd1; ?></p>
        <span><?php echo $dd[0]; ?></span>
    </div>
</div>
<div class="event-content-holder">
    <h3><a href="event-inner.php?id=<?php echo $rw['id']; ?>"><?php echo $rw['ename']; ?>
</a></h3>
    <p><?php echo $rw['spe']; ?></p>
 <ul>
        
        <li><?php echo $rw['place']; ?></li>
    </ul>
</div>
</li>
<?php } ?>  
<?php echo $out; ?>                        
                                                                                   
                        </ul>
                        <div class="event-btn-holder">
                            <a href="event.php?ename=3" target="_blank" class="view-all-primary-btn">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include('footer.html'); ?>
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Body Area End Here -->
    
  
    
    
    
    
    
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
    <!-- Gridrotator js -->
    <script src="js/jquery.gridrotator.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
    
    
      
    <script>
       jQuery.fn.liScroll = function (settings) {
  settings = jQuery.extend(
    {
      travelocity: 0.05
    },
    settings
  );
  return this.each(function () {
    var $strip = jQuery(this);
    $strip.addClass("newsticker");
    var stripHeight = 1;
    $strip.find("li").each(function (i) {
      stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
    });
    var $mask = $strip.wrap("<div class='mask'></div>");
    var $tickercontainer = $strip
      .parent()
      .wrap("<div class='tickercontainer'></div>");
    var containerHeight = $strip.parent().parent().height(); //a.k.a. 'mask' width
    $strip.height(stripHeight);
    var totalTravel = stripHeight;
    var defTiming = totalTravel / settings.travelocity; // thanks to Scott Waye
    function scrollnews(spazio, tempo) {
      $strip.animate({ top: "-=" + spazio }, tempo, "linear", function () {
        $strip.css("top", containerHeight);
        scrollnews(totalTravel, defTiming);
      });
    }
    scrollnews(totalTravel, defTiming);
    $strip.hover(
      function () {
        jQuery(this).stop();
      },
      function () {
        var offset = jQuery(this).offset();
        var residualSpace = offset.top + stripHeight;
        var residualTime = residualSpace / settings.travelocity;
        scrollnews(residualSpace, residualTime);
      }
    );
  });
};

$(function () {
  $("ul#news-alerts").liScroll();
}); 
      
    </script>
    
</body>



</html>
