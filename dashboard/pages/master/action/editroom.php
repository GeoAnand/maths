<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$sts=1;
$added_on=date('Y-m-d h:i:s');

	$sqlBl="UPDATE addroom SET ";
	$sqlBl=$sqlBl."pid='".$sts."',";
	$sqlBl=$sqlBl."rname='".$_POST['rname']."',";
	$sqlBl=$sqlBl."status='".$sts."',";
	$sqlBl=$sqlBl."added_by='".$added_by."',";
	$sqlBl=$sqlBl."added_on='".$added_on."'";
	$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
	$UsQuery=mysqli_query($conn,$sqlBl);


if($UsQuery){
	header('location:'.$home_path.'/pages/master/editroom.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/master/editroom.php?msg=error&id='.$_POST['idD']);	
}

?>
