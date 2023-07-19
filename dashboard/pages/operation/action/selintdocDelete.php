<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
/* $added_by=$_SESSION['userid']; */


$sqd="delete from documents";
$sqd=$sqd." where id='".$_GET['id']."'";
/*  echo $sqd;
 die(); */
$UsQuery=mysqli_query($conn,$sqd);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewdocuments.php?msg=success');
}else{
	header('location:'.$home_path.'/pages/operation/viewdocuments.php?msg=error');
}

	
?>



