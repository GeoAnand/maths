<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$added_on=date('Y-m-d h:i:s');
$sts="1";

	$slBl="UPDATE user SET ";
	$slBl=$slBl."password='".$_POST['npass']."'";
	$slBl=$slBl." where id='".$_SESSION['uid']."'";
	 /* echo $slBl; */ 
	$UsQuery =mysqli_query($conn,$slBl); 
	
if($UsQuery){
	header('location:'.$home_path.'/pages/administration/changepass.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/administration/changepass.php?msg=error');	
}

?>
