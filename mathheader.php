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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="css2/style.css">
<link rel="stylesheet" href="fonts2/icomoon/style.css">
<link rel="stylesheet" href="css2/bootstrap-grid.min.css">
<link rel="stylesheet" href="css2/bootstrap.min.css.map">

<link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />

<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


<!-- boostrap - accordion -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
<!-- Include Bootstrap CSS -->

<!-- bootstrap carousel -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css"> -->
<!-- carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>




<!-- Include Owl Carousel CSS -->
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css'>



<!-- boostrap - accordion - script -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->

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

<header class="site-navbar js-sticky-header site-navbar-target" role="banner" style="background-color: #f1f1f1;">
    <section class="ftco-section">
      <div class="container-fluid px-md-5">
        <div class="row justify-content-between">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2 iitm-logo">
                <a href="<?php echo $home_path; ?>/"><img src="img/iitm-logo.png" class="site_logo"></a>
              </div>
              <div class="col-md-6 dept-name" style="padding: 10px 0px 0px 0px;">
                <a class="navbar-brand" href="#"> DEPARTMENT OF Mathematics  <span>Indian
                    Institute Of Technology Madras</span></a>
              </div>


              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script>
                $(document).ready(function() {
                  $('form.searchform').submit(function(e) {
                    e.preventDefault();
                    var searchQuery = $('#searchInput').val().trim();
                    findAndHighlight(searchQuery);
                  });

                  function findAndHighlight(query) {
                    if (query) {
                      var found = window.find(query, false, false, true, false, true, false);
                      if (!found) {
                        clearHighlighting();
                      } else {
                        var count = getSearchCount(query);
                        displaySearchCount(count);
                      }
                    } else {
                      clearHighlighting();
                      displaySearchCount(0);
                    }
                  }

                  function clearHighlighting() {
                    var selection = window.getSelection();
                    selection.removeAllRanges();
                  }

                  function getSearchCount(query) {
                    var text = document.body.innerText;
                    var regex = new RegExp(query, 'gi');
                    var matches = text.match(regex);
                    return matches ? matches.length : 0;
                  }

                  function displaySearchCount(count) {
                    var searchCount = $('.searchCount');
                    searchCount.text(count);
                    searchCount.toggle(count > 0);
                  }
                });
              </script>


              <div class="col-md-4 d-md-flex justify-content-end mb-md-0 mb-3 searchbar">
                <form action="#" class="searchform order-lg-last" autocomplete="off">
                  <div class="form-group d-flex" style="margin-right: 0px; margin-bottom: 1rem;">
                    <input type="text" class="form-control pl-3" id="searchInput" placeholder="Search">
                    <button type="submit" class="form-control search"><span class="fa fa-search"></span></button>
                  </div>
                </form>
              </div>


            </div>
          </div>
        </div>
      </div>



    </section>
    

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="container navbar-con">
      <div class="row align-items-center position-relative">




        <div class="col-12">
          <nav class="site-navigation text-center ml-auto " role="navigation">

            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block" style="padding-left:0;">
              <li><a href="index.php" class="nav-link">HOME</a></li>
              <li class="has-children">
                <a href="#about-section" class="nav-link">People</a>
                <ul class="dropdown arrow-down">
                  <li class="has-children">
                    <a href="#">Faculty</a>
                    <ul class="dropdown">
                      <li><a href="outerfaculty.php">Faculty</a></li>
                      <li><a href="<?php echo $home_path; ?>/committees/classcommittee">Inspire Faculty</a></li>
                      <li><a href="<?php echo $home_path; ?>/committees/grievancerc">Visiting Faculty</a></li>
                      <li><a href="<?php echo $home_path; ?>/committees/grievancerc">Retired Faculty</a></li>
                    </ul>
                  </li>
                  <li class="has-children">
                    <a href="#">Students</a>
                    <ul class="dropdown">
                      <li><a href="<?php echo $home_path; ?>/committees/grievancerc">Undergraduate Students</a></li>
                      <li class="has-children">
                        <a href="#">Master's Student</a>
                        <ul class="dropdown">
                        <li><a href="btech.php?yr=<?php echo $rq4['yr']; ?>&deg=4">M.Sc.</a></li>
                        <li> <a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=5">Ph.D</a></li>
                        <li><a href="btech.php?yr=<?php echo $rq5['yr']; ?>&deg=3">M.Tech</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="<?php echo $home_path; ?>/post-doct" class="nav-link">Patents</a></li>
                  <li><a href="<?php echo $home_path; ?>/chairprof" class="nav-link">Research Groups</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="#about-section" class="nav-link">Resources</a>
                <ul class="dropdown arrow-down">
                  <li><a href="links.php" class="nav-link">Links</a></li>
                  <li><a href="document.php" class="nav-link">Documents</a></li>
                  <li><a href="gallery.php" class="nav-link">Gallery</a></li>
                  <li><a href="<?php echo $home_path; ?>/whoteach" class="nav-link">Videos</a></li>
                </ul>
              </li>

              <li class="has-children">
                <a href="#about-section <?php echo $abt3; ?>" class="nav-link">Academics</a>
                <ul class="dropdown arrow-down">
                  <li class="has-children">
                    <a href="#about-section" class="nav-link">Programs</a>
                    <ul class="dropdown arrow-down">
                    <li><a href="program-msc-new.php">M.Sc.</a></li>
                    <li><a href="program-phd-new.php">Ph.D</a></li>
                    <li><a href="program-mtech-new.php">M.Tech</a></li>
                    </ul>
                  </li>
                  <li class="has-children">
                  <a href="#about-section" class="nav-link">Courses</a>
                  <ul class="dropdown arrow-down">
                  <li><a href="program-dual-new.php">Other Courses</a></li>
                  <li> <a href="Program-PhD-admissions.php">Ph.D Admission</a></li>
                  </ul>
                  </li>
                  <li><a href="#">TimeTable</a></li>
                  <li> <a href="#">Academic Rules</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="#about-section" class="nav-link">Research</a>
                <ul class="dropdown arrow-down">
                <li><a href="research-area.php">Research Area</a></li>
                <li><a href="#">Publications</a></li>
                <li><a href="#">Books by Faculty</a></li>
                <li><a href="#">Awards And Recognitions</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="#about-section" class="nav-link">Careers</a>
                <ul class="dropdown arrow-down">
                  <li><a href="<?php echo $home_path; ?>/msphd" class="nav-link">Faculty Positions</a></li>
                  <li><a href="<?php echo $home_path; ?>/courses" class="nav-link">Project Positions</a></li>
                  <li><a href="<?php echo $home_path; ?>/whoteach" class="nav-link">Staff Positions</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="#about-section" class="nav-link">News and Events</a>
                <ul class="dropdown arrow-down">
                  <li class="has-children">
                  <a href="#about-section" class="nav-link">Programs</a>
                    <ul class="dropdown arrow-down">
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
              </ul>
              </li>

              <li><a href="contact.php" class="nav-link">Contact Us</a></li>

            </ul>
          </nav>

        </div>


        <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3" style="font-size: 30px; font-family: 'Lato',sans-serif;">&nbsp;MENU</span></a></div>

      </div>
    </div>

  </header>


  <script src="http://localhost/maths-new/js2/jquery.min.js"></script>
    <script src="http://localhost/maths-new/js2/popper.js"></script>
    <script src="http://localhost/maths-new/js2/bootstrap.min.js"></script>
    <script src="http://localhost/maths-new/js2/jquery.sticky.js"></script>
    <script src="http://localhost/maths-new/js2/jquery.touch-swipe.min.js"></script>
    <script src="http://localhost/maths-new/js2/main.js"></script>

              </body>