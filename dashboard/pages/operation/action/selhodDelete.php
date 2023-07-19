<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$sqd="delete from hod";
$sqd=$sqd." where id='".$_GET['id']."' ";
/*  echo $sqd;
 die(); */
$UsQuery=mysqli_query($conn,$sqd);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/hod.php?msg=success&fid='.$fd.'&facid='.$_GET['facid']);
}else{
	header('location:'.$home_path.'/pages/operation/hod.php?msg=error&fid='.$fd.'&facid='.$_GET['facid']);
}

/* if($UsQuery){
   echo 1; 
}else{
   echo 2; 
} */
	
?>



