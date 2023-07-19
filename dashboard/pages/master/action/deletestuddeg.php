<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$sqd="delete from studdeg";
$sqd=$sqd." where id='".$_GET['id']."'";
/*  echo $sqd;
 die(); */
$UsQuery=mysqli_query($conn,$sqd);


if($UsQuery){
	header('location:'.$home_path.'/pages/master/viewstudentdegree.php?msg=success&id='.$fd);
}else{
	header('location:'.$home_path.'/pages/master/viewstudentdegree.php?msg=error&id='.$fd);
}

/* if($UsQuery){
   echo 1; 
}else{
   echo 2; 
} */
	
?>



