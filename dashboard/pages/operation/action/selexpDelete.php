<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$sqd="delete from profileexperience";
$sqd=$sqd." where id='".$_GET['id']."' AND fuid='".$_GET['facid']."'";
/*  echo $sqd;
 die(); */
$UsQuery=mysqli_query($conn,$sqd);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewexp.php?msg=success&fid='.$fd.'&facid='.$_GET['facid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewexp.php?msg=error&fid='.$fd.'&facid='.$_GET['facid']);
}

/* if($UsQuery){
   echo 1; 
}else{
   echo 2; 
} */
	
?>



