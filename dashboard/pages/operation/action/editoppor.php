<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$added_on=date('Y-m-d h:i:s');
$pid="1";
$sts="1";




$sqqu=mysqli_query($conn,"select * from oppr where id='".$_POST['idD']."'");
$rqqu=mysqli_fetch_array($sqqu);





	$sqlBl="UPDATE oppr SET ";
	$sqlBl=$sqlBl."pid='".$pid."',";
	$sqlBl=$sqlBl."title='".$_POST['title']."',";
	$sqlBl=$sqlBl."article_content='".mysqli_real_escape_string($conn,$_POST['article_content'])."',";
	
	$sqlBl=$sqlBl."status='".$sts."',";
	$sqlBl=$sqlBl."added_by='".$added_by."',";
	$sqlBl=$sqlBl."added_on='".$added_on."'";
	$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
	$UsQuery=mysqli_query($conn,$sqlBl);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/editoppor.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/operation/editoppor.php?msg=error&id='.$_POST['idD']);	
}

?>
