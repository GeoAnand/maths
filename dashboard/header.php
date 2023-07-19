<?php
session_start();
include("config.php");

if(!isset($_SESSION['uid'])) 
{
header ("Location: ".$home_path."/index.php");
}else{
}

//echo "select * from user where id='".$_SESSION['uid']."'";
$rd1=mysqli_fetch_array(mysqli_query($conn,"SELECT * from user where id='".$_SESSION['uid']."'"));
$rd2=mysqli_fetch_array(mysqli_query($conn,"SELECT * from profile where fusrid='".$_SESSION['uid']."'"));


// if($rd2['fid']!=''){
// 	$fid=$rd2['fid'];
// }else{
// 	$fid="";


// }


$facultyResult = mysqli_query($conn, "SELECT snameid,scontent,simg FROM stuach");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$snameid = isset($facultyRow['snameid']) ? $facultyRow['snameid'] : '';
$scontent = isset($facultyRow['scontent']) ? $facultyRow['scontent'] : '';
$simg = isset($facultyRow['simg']) ? $facultyRow['simg'] : '';




$facultyResult = mysqli_query($conn, "SELECT cheading,cvalue FROM counter");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$cvalue = isset($facultyRow['cvalue']) ? $facultyRow['cvalue'] : '';
$cheading = isset($facultyRow['cheading']) ? $facultyRow['cheading'] : '';

$facultyResult = mysqli_query($conn, "SELECT ucontent,uimg,udate FROM upcoming ");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$ucontent = isset($facultyRow['ucontent']) ? $facultyRow['ucontent'] : '';
$uimg = isset($facultyRow['uimg']) ? $facultyRow['uimg'] : '';
$udate = isset($facultyRow['udate']) ? $facultyRow['udate'] : '';

// Fetching facname from the achievement table
$facultyResult = mysqli_query($conn, "SELECT facname,facdesig,fcontent,fimg FROM achievement");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$facname = isset($facultyRow['facname']) ? $facultyRow['facname'] : '';
$facdesig = isset($facultyRow['facdesig']) ? $facultyRow['facdesig'] : '';
$fcontent = isset($facultyRow['fcontent']) ? $facultyRow['fcontent'] : '';
$fimg = isset($facultyRow['fimg']) ? $facultyRow['fimg'] : '';

$facultyResult = mysqli_query($conn, "SELECT nhead,ncontent,nimg,nlink FROM news");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$nhead = isset($facultyRow['nhead']) ? $facultyRow['nhead'] : '';
$ncontent = isset($facultyRow['ncontent']) ? $facultyRow['ncontent'] : '';
$nimg = isset($facultyRow['nimg']) ? $facultyRow['nimg'] : '';
$nlink = isset($facultyRow['nlink']) ? $facultyRow['nlink'] : '';


$facultyResult = mysqli_query($conn, "SELECT hcontent,himg FROM hodcontent");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$hcontent = isset($facultyRow['hcontent']) ? $facultyRow['hcontent'] : '';
$himg = isset($facultyRow['himg']) ? $facultyRow['himg'] : '';


$facultyResult = mysqli_query($conn, "SELECT eid,evemon,evedate,evehead,eveaddr,evelink,eveimg FROM event");
$facultyRow = mysqli_fetch_assoc($facultyResult);
$evemon = isset($facultyRow['evemon']) ? $facultyRow['evemon'] : '';
$eid = isset($facultyRow['eid']) ? $facultyRow['eid'] : '';
$evedate = isset($facultyRow['evedate']) ? $facultyRow['evedate'] : '';
$evehead = isset($facultyRow['evehead']) ? $facultyRow['evehead'] : '';
$eveaddr = isset($facultyRow['eveaddr']) ? $facultyRow['eveaddr'] : '';
$evelink = isset($facultyRow['evelink']) ? $facultyRow['evelink'] : '';
$eveimg = isset($facultyRow['eveimg']) ? $facultyRow['eveimg'] : '';


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo $home_path; ?>/images/logo3.png" type="image/ico" />
    <title>Department of Maths – IIT Madras</title>

    <!-- Bootstrap -->
    <link href="<?php echo $home_path; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $home_path; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $home_path; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?php echo $home_path; ?>/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- j-query -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Custom Theme Style -->
    <link href="<?php echo $home_path; ?>/build/css/custom.min.css" rel="stylesheet">
	
	
	
   <!--<link href="<?php echo $home_path; ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">-->
    <!-- Datatables -->
    <link href="<?php echo $home_path; ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $home_path; ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $home_path; ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $home_path; ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $home_path; ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
	  
	  
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view"> 
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"> <img src="<?php echo $home_path; ?>/images/logo3.png" alt="..." class="img-circle profile_img" style="width:67px;position:absolute;background:none;margin: 0px 0 0 -8px;"><span></span></a>
            </div>

            <div class="clearfix"></div>

           

       

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               <!-- <h3>General</h3>-->
                <ul class="nav side-menu">
                    
                    
           <?php if($rd1['usertype']=="faculty") { ?>
               
                <!-- <li><a href="<?php echo $home_path; ?>/dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
				 </li> -->
               
                  <!-- <li><a><i class="fa fa-desktop"></i>Profile<span class="fa fa-chevron-down"></span></a>
</li>-->

<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3'){ ?>

  <li><a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php?fid=<?php echo $fid; ?>&facid=<?php echo "1"; ?>"><i class="fa fa-desktop"></i>Profile</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewareas.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>"><i class="fa fa-desktop"></i>Area of Interest</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewexp.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>"><i class="fa fa-desktop"></i>Teaching</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewjournal.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>"><i class="fa fa-desktopheasder"></i>Journal Publications</a></li>
   <li><a href="<?php echo $home_path; ?>/pages/operation/viewbooks.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>"><i class="fa fa-desktop"></i>Books</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewaward.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>"><i class="fa fa-desktop"></i>Students</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/research.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>"><i class="fa fa-desktop"></i>Research Description</a></li>
  
<?php }else{ ?>


  <li><a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php"><i class="fa fa-desktop"></i>Biography</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewareas.php"><i class="fa fa-desktop"></i>Area of Interest</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewexp.php"><i class="fa fa-desktop"></i>Teaching</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewjournal.php"><i class="fa fa-desktop"></i>Journal Publications</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewbooks.php"><i class="fa fa-desktop"></i> Books</a></li>
  
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewaward.php"><i class="fa fa-desktop"></i>Students</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/research.php"><i class="fa fa-desktop"></i>Research Description</a></li>
  
<?php } ?>








<li><a href="<?php echo $home_path; ?>/pages/operation/room.php"><i class="fa fa-table"></i> Room Booking </a>
                    
                  </li>
               
               
         <?php  }  else 
         
         if($rd1['usertype']=="office") {
         
         ?>      
                    
             <li><a href="<?php echo $home_path; ?>/pages/operation/room.php"><i class="fa fa-table"></i> Room Booking </a>
                    
                  </li>       
                    
                    
           <?php  }  
           
           else 
           
           { ?>         
				 <li><a href="<?php echo $home_path; ?>/dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
				 </li>
                  <!--<li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                      <li><a href="index2.php">Dashboard2</a></li>
                      <li><a href="index3.php">Dashboard3</a></li>
                    </ul>
                  </li>-->

                  <!-- <li><a><i class="fa fa-edit"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $home_path; ?>/pages/master/viewfaculty.php">Faculty</a></li>
                      
                      <li><a href="<?php echo $home_path; ?>/pages/master/viewdivision.php">Division</a></li>
                      
                      
                      
                      <li><a href="<?php echo $home_path; ?>/pages/master/viewstudentdegree.php">Student Degree</a></li>
                      
                       <li><a href="<?php echo $home_path; ?>/pages/master/viewprogram.php">Program Category</a></li>
                       
                        <li><a href="<?php echo $home_path; ?>/pages/master/viewevent.php">Event Category</a></li>
                        
                         <li><a href="<?php echo $home_path; ?>/pages/master/addroom.php">Add Room</a></li>
                         
                         <li><a href="<?php echo $home_path; ?>/pages/master/addcommittee.php">Add Committee</a></li>
                         
                         
                         
                         <li><a href="<?php echo $home_path; ?>/pages/master/viewiddd-program-cat.php">Add IDDD Program Category</a></li>
                         
                         <li><a href="<?php echo $home_path; ?>/pages/master/alumni-year.php">Add Alumni Year</a></li>
                         
                      
                      
                      <li><a href="form_advanced.php">Advanced Components</a></li>
                      <li><a href="form_validation.php">Form Validation</a></li>
                      <li><a href="form_wizards.php">Form Wizard</a></li>
                      <li><a href="form_upload.php">Form Upload</a></li>
                      <li><a href="form_buttons.php">Form Buttons</a></li>
                    </ul>
                  </li> -->
                  
                  
<!-- 				  
<li><a><i class="fa fa-desktop"></i>Profile<span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">

<?php if(isset($_SESSION['uid']) && $_SESSION['uid']=='3'){ ?>

  <li><a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php?fid=<?php echo $fid; ?>&facid=<?php echo "1"; ?>">Profile</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewareas.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>">Area of Interest</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewexp.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>">Teaching</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewjournal.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>">Selected Journal Publications</a></li>
   <li><a href="<?php echo $home_path; ?>/pages/operation/viewbooks.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>">Research Book</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewaward.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>">Student</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/research.php?fid=<?php echo $fid; ?>&facid=<?php echo "1";  ?>">Research</a></li>
  
<?php }else{ ?>

  <li><a href="<?php echo $home_path; ?>/pages/operation/viewprofile.php?fid=<?php echo $fid; ?>">Profile</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewareas.php?fid=<?php echo $fid; ?>&facid=<?php echo $rd1['facid']; ?>">Area of Interest</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewexp.php?fid=<?php echo $fid; ?>&facid=<?php echo $rd1['facid']; ?>">Teaching</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewjournal.php?fid=<?php echo $fid; ?>&facid=<?php echo $rd1['facid']; ?>">Selected Journal Publications</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewbooks.php?fid=<?php echo $fid; ?>&facid=<?php echo $rd1['facid']; ?>">Research Book</a></li>
  
  <li><a href="<?php echo $home_path; ?>/pages/operation/viewaward.php?fid=<?php echo $fid; ?>&facid=<?php echo $rd1['facid']; ?>">Student</a></li>
  <li><a href="<?php echo $home_path; ?>/pages/operation/research.php?fid=<?php echo $fid; ?>&facid=<?php echo $rd1['facid']; ?>">Research</a></li>
  
<?php } ?>
</ul>
</li> -->
<!-- homepage -->

<li><a><i class="fa fa-user"></i> Homepage <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $home_path; ?>/pages/master/upcoming.php">Upcoming News/Events</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/master/stuach.php">Student achievement</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/master/hodc.php">HOD Message</a></li>
                    <!-- <li><a href="<?php echo $home_path; ?>#">Inspire Faculty</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Visiting Faculty</a></li> -->
                    <li><a href="<?php echo $home_path; ?>/pages/master/counter.php">Counter</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/facach.php">Faculty achievement</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/news.php">News</a></li>
                      <li><a href="<?php echo $home_path; ?>/pages/operation/events.php">Events</a></li>
                      <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/viewiddd.php">Add IDDD</a></li> -->
                    </ul>
                  </li>

<!-- people -->
<li><a><i class="fa fa-user"></i> People <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $home_path; ?>/pages/master/viewfaculty.php">Faculty</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/master/viewdivision.php">Division</a></li>
                    <!-- <li><a href="<?php echo $home_path; ?>#">Inspire Faculty</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Visiting Faculty</a></li> -->
                    <li><a href="<?php echo $home_path; ?>/pages/operation/viewpost.php">Add Post doctoral</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/viewstaff.php">Staff</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Retired Faculty</a></li>
                      
                      <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/viewiddd.php">Add IDDD</a></li> -->
                    </ul>
                  </li>
<!-- students -->
 <li><a><i class="fa fa-male"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $home_path; ?>/pages/master/viewstudentdegree.php">Student Degree</a></li>
                    <!-- <li><a href="<?php echo $home_path; ?>#">M.Sc</a></li>
                    <li><a href="<?php echo $home_path; ?>#">M.Tech</a></li>
                    <li><a href="<?php echo $home_path; ?>#">P.hD</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/viewpost.php">Add Graduate Students</a></li> -->
                      <li><a href="<?php echo $home_path; ?>/pages/operation/student.php">Add Student</a></li>
                      <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/viewiddd.php">Add IDDD</a></li> -->
                    </ul>
                  </li>
                  <!-- Research -->
                  <li><a><i class="fa fa-book"></i> Research <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <!--<li><a href="<?php echo $home_path; ?>#">Research Area</a></li>-->
                    <!--<li><a href="<?php echo $home_path; ?>#">Research Groups</a></li>-->
                    <!--<li><a href="<?php echo $home_path; ?>#">Recent Publications</a></li>-->
                    <li><a href="<?php echo $home_path; ?>/pages/operation/addresearchs.php">Research</a></li>
                    </ul>
                  </li>
                  <!-- Publications -->
                  <li><a><i class="fa fa-book"></i> Publications <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $home_path; ?>#">Publications</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Add Publications</a></li>
                    </ul>
                  </li>
                  <!-- programs -->
                  <li><a><i class="fa fa-bars"></i> Programs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="<?php echo $home_path; ?>/pages/operation/student.php">M.sc</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/student.php">M.Tech</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/student.php">Ph.D</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/operation/student.php">B.Tech & Dual Degree</a></li>
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewprogram.php">Add Program</a></li>
                      <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/viewiddd.php">Add IDDD</a></li> -->
                    </ul>
                  </li>
                  <!-- Events -->
                  <li><a><i class="fa fa-calendar"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <!-- <li><a href="<?php echo $home_path; ?>#">Geometry  & Topology Seminar</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Student Seminar</a></li>
                    <li><a href="<?php echo $home_path; ?>#">NSMA</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Forays</a></li>
                    <li><a href="<?php echo $home_path; ?>#">In house Symposium</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Discrete Mathematics Seminar</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Algebra Seminar</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Conferences</a></li>
                    <li><a href="<?php echo $home_path; ?>#">Colloquium</a></li> -->
                    <li><a href="<?php echo $home_path; ?>/pages/operation/viewevent.php">Add Event</a></li>
                    <li><a href="<?php echo $home_path; ?>/pages/master/viewevent.php">Add Event Category</a></li>
                      <!--<li><a href="tables_dynamic.php">Table Dynamic</a></li>-->
                    </ul>
                  </li>


<!-- <li><a><i class="fa fa-table"></i> Others <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="<?php echo $home_path; ?>/pages/about/viewabout.php">Welcome Msg </a>
                    
                  </li>
                      <li><a href="<?php echo $home_path; ?>/pages/about/viewdcf.php">DCF</a></li>
                      <li><a href="<?php echo $home_path; ?>/pages/operation/slider.php">Home-Slider</a></li> 
                       <li><a href="<?php echo $home_path; ?>/pages/operation/hod.php">HOD Message</a></li>
                       <li><a href="<?php echo $home_path; ?>/pages/operation/viewalumni.php">Alumni</a></li>
                    </ul>
                  </li> -->






<!-- <li><a href="<?php echo $home_path; ?>/pages/operation/room.php"><i class="fa fa-table"></i> Room Booking </a>
                    
                  </li> -->





 <!-- <li><a><i class="fa fa-table"></i> Staff <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewstaff.php">Add Staff</a></li>
                      <li><a href="tables_dynamic.php">Table Dynamic</a></li>
                    </ul>
                  </li> -->





 <!-- <li><a><i class="fa fa-table"></i> Post Doctoral Fellows <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewpost.php">Add Post doctoral</a></li>
                      <li><a href="tables_dynamic.php">Table Dynamic</a></li>
                    </ul>
                  </li> -->



<!-- <li><a><i class="fa fa-table"></i> Programs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewprogram.php">Add Program</a></li>
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewprogramdes.php">Add Program Description</a></li>
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewidddprogram.php">Add IDDD Program</a></li>
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewidddprogramdes.php">Add IDDD Program Description</a></li>
                      
                    </ul>
                  </li> -->






<li><a><i class="fa fa-folder"></i> Resource <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/viewoppor.php">Add Opportunities</a></li>
                      
                      <li><a href="<?php echo $home_path; ?>/pages/operation/viewcentral.php">Central Facilities</a></li> -->
                      
                       <li><a href="<?php echo $home_path; ?>/pages/operation/viewlink.php">Link</a></li>
                       
                        <li><a href="<?php echo $home_path; ?>/pages/operation/viewdocuments.php">Documents</a></li>
                        
                         <li><a href="<?php echo $home_path; ?>/pages/operation/viewgallery.php">gallery</a></li>

                         <li><a href="<?php echo $home_path; ?>/pages/operation/viewgallery.php">Videos</a></li>

                         <li><a href="<?php echo $home_path; ?>/pages/operation/room.php">Conference Halls</a></li>
                         
                          <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/addcenter.php">center</a></li>
                          
                           <li><a href="<?php echo $home_path; ?>/pages/operation/addcommittee.php">Committees</a></li>
                      
                      <li><a href="<?php echo $home_path; ?>/pages/operation/addresearchs.php">Research</a></li> -->
                      
                      <!--<li><a href="tables_dynamic.php">Table Dynamic</a></li>-->
                    </ul>
                  </li>
<!-- bookings -->
                  <!-- <li><a href="<?php echo $home_path; ?>/pages/operation/room.php"><i class="fa fa-calendar"></i> Room Booking </a>
                    
                  </li> -->



<!--<li><a><i class="fa fa-table"></i> Announcement <span class="fa fa-chevron-down"></span></a>-->
<!--                    <ul class="nav child_menu">-->
<!--                      <li><a href="<?php echo $home_path; ?>/pages/operation/imp-news.php">Important Announcement</a></li>-->
                      
                       
<!--                    </ul>-->
<!--                  </li>-->
                  
                  
				  
                  <li><a><i class="fa fa-table"></i> Administration <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $home_path; ?>/pages/administration/viewuser.php">User</a></li>
                      <!--<li><a href="tables_dynamic.php">Table Dynamic</a></li>-->
                    </ul>
                  </li>
                  
                  
                  
                  
                  
                <?php  }  ?>      
                  
				  
                
				  
                </ul>
              </div>

            </div>
          
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
				
              </div>


				<span class="" style="font-size: 15px;text-align: center;width: 82%;float: left;color: #000;font-weight:bold;margin: 10px 0 0 0;"><!--<img src="http://localhost/mmeadmin/images/logo3.png" alt="..." class="img-circle profile_img" style="width:52px;">-->Department of Maths, IIT Madras</span>
			  
			  
              <ul class="nav navbar-nav navbar-right" style="width:10%;float:right;">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="white-space: nowrap;">

                   <i class="fa fa-user"></i>&nbsp;&nbsp;<?php if(isset($_SESSION['name'])) {echo ucwords($_SESSION['name']);}else{echo "";} ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
                    <li><a href="<?php echo $home_path; ?>/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    
                    <li><a href="<?php echo $home_path; ?>/pages/administration/changepass.php"><i class="fa fa-sign-out pull-right"></i> Change Password</a></li>
                    
                  </ul>
                </li>

                <!--<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>-->
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->
