<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$sqd="delete from faculty";
$sqd=$sqd." where id='".$_GET['id']."'";
// echo $sqd;
 //die();
$UsQuery=mysqli_query($conn,$sqd);

$sqd1="delete from profilejournal";
$sqd1=$sqd1." where fuid='".$_GET['id']."'";
//  echo $sqd;
$UsQuery=mysqli_query($conn,$sqd1);
 
$sqd2="delete from profileintareas";
$sqd2=$sqd2." where fuid='".$_GET['id']."'";
//  echo $sqd;
$UsQuery=mysqli_query($conn,$sqd2);  
 
$sqd3="delete from  profileexperience";
$sqd3=$sqd3." where fuid='".$_GET['id']."'";
//  echo $sqd;
$UsQuery=mysqli_query($conn,$sqd3);  
 
$sqd4="delete from  profilebook";
$sqd4=$sqd4." where fuid='".$_GET['id']."'";
//  echo $sqd;
$UsQuery=mysqli_query($conn,$sqd4);  
 
$sqd6="delete from  profileaward";
$sqd6=$sqd6." where fuid='".$_GET['id']."'";
//  echo $sqd;
$UsQuery=mysqli_query($conn,$sqd6); 
 
$sqd7="delete from  profile";
$sqd7=$sqd7." where fuid='".$_GET['id']."'";
//  echo $sqd;
$UsQuery=mysqli_query($conn,$sqd7);
 
 
$sqd8="delete from  research";
$sqd8=$sqd8." where fuid='".$_GET['id']."'";
/*  echo $sqd;
 die(); */
$UsQuery=mysqli_query($conn,$sqd);



if($UsQuery){
	header('location:'.$home_path.'/pages/master/viewfaculty.php?msg=success&id='.$fd);
}else{
	header('location:'.$home_path.'/pages/master/viewfaculty.php?msg=error&id='.$fd);
}

/* if($UsQuery){
   echo 1; 
}else{
   echo 2; 
} */
	
?>



