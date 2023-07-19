<?php
session_start();
include("config.php"); 
 
 
 
   $pgenme= basename($_SERVER['PHP_SELF']);
   if(isset($pgenme) && $pgenme=='index.php'){
    $abt="active";
    }else if(isset($pgenme) && $pgenme=='research-area.php' || $pgenme=='center.php' ){
    $abt1="active";
    }else if(isset($pgenme) && $pgenme=='faculty.php' || $pgenme=='hod.php'  || $pgenme=='staff.php'  || $pgenme=='postdoc.php'  || $pgenme=='btech.php'  || $pgenme=='alumni.php' || $pgenme=='iddd.php'  ){
    $abt2="active";
    }else if(isset($pgenme) && $pgenme=='program-btech-new.php' || $pgenme=='program-dual-new.php' || $pgenme=='program-mtech-new.php' || $pgenme=='program-msc-new.php' || $pgenme=='program-phd-new.php' || $pgenme=='program-interd-new.php'){
    $abt3="active";
    }else if(isset($pgenme) && $pgenme=='committee.php'){
    $abt4="active";
    }else if(isset($pgenme) && $pgenme=='event.php'){
    $abt5="active";
    }else if(isset($pgenme) && $pgenme=='oppor.php'){
    $abt6="active";
    }else if(isset($pgenme) && $pgenme=='central-facilities.php' || $pgenme=='links.php' || $pgenme=='document.php' || $pgenme=='gallery.php' ){
    $abt7="active";
    }
    else if(isset($pgenme) && $pgenme=='contact.php'){
    $abt8="active";
    }
  
?>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Maths IITM</title>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernizr Js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
   
   
  
</head>

<body>
<?php
$rq=mysqli_fetch_array(mysqli_query($conn,"select MAX(yr)AS yr from iddd "));

//$rq1=mysqli_fetch_array(mysqli_query($conn,"select * from 	student where deg='1' group by yr order by yr DESC "));
$rq1=mysqli_fetch_array(mysqli_query($conn,"select MAX(yr)AS yr from student where deg='1'"));
$rq1yr=$rq1['yr'];
//echo "test ".$rq1yr;

$rq2=mysqli_fetch_array(mysqli_query($conn,"select MAX(yr)AS yr from student where deg='2' "));

$rq3=mysqli_fetch_array(mysqli_query($conn,"select  MAX(yr)AS yr from 	student where deg='3' "));

$rq4=mysqli_fetch_array(mysqli_query($conn,"select  MAX(yr)AS yr from 	student where deg='4' "));

$rq5=mysqli_fetch_array(mysqli_query($conn,"select  MAX(yr)AS yr from 	student where deg='5' "));

//echo "select  MAX(alumniyear)AS yr,id from alumniyear group by alumniyear";
$rq51=mysqli_fetch_array(mysqli_query($conn,"select  MAX(alumniyear)AS yr from alumniyear "));
//echo "select* from alumniyear where year='".$rq51['yr']."'";
$rq52=mysqli_fetch_array(mysqli_query($conn,"select* from alumniyear where alumniyear='".$rq51['yr']."'"));

$s1q3=mysqli_query($conn,"select MAX(alumniyear)AS yd,id from alumniyear");
//$sqc=mysqli_query($conn,"SELECT CAST(alumniyear AS UNSIGNED),alumniyear,id FROM alumniyear order by alumniyear DESC");
$r1q3=mysqli_fetch_array($s1q3);
?>
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header2" class="header2-area">
              
                <div class="main-menu-area bg-textPrimary" id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                               <div class="logo-area">
                                    <a href="index.php"><img class="img-responsive" src="img/iit-logo.png" alt="logo" style="width: 75px;"></a>
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
                                                           <li><a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=3">M.Tech</a></li>
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
                                                        <li><a href="program-msc-new.php">M.Sc.</a></li>
                                                        <li><a href="program-phd-new.php">Ph.D</a></li>
                                                        <li><a href="program-mtech-new.php">M.Tech</a></li>
                                                    </ul>
                                            </li>
                                            <li class="has-child-menu"><a href="#">Courses</a>
                                                    <ul class="thired-level">
                                                          <li>  <a href="program-dual-new.php">Other Courses</a></li>
                                                           <li> <a href="Program-PhD-admissions.php">Ph.D Admission</a></li>
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
											 <li><a href="https://physics.iitm.ac.in/~cvkmind/student_activities/" target="_blank">Student Activities</a></li>
                                           
                                            
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
                                                
                                                 <li><a href="dashboard/" target="_blank">Faculty Section</a></li>
                                                 <li><a href="irf.php">Incident Reporting</a></li>
                                                
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
