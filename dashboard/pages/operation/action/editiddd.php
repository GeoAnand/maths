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




$sqqu=mysqli_query($conn,"select * from iddd where id='".$_POST['idD']."'");
$rqqu=mysqli_fetch_array($sqqu);



	$sqlBl="UPDATE iddd SET ";
	$sqlBl=$sqlBl."pid='".$sts."',";
	
	$sqlBl=$sqlBl."deg='".$_POST['deg']."',";

	
		$sqlBl=$sqlBl."yr='".$_POST['yr']."',";
		
		$sqlBl=$sqlBl."sname='".$_POST['sname']."',";
		
		$sqlBl=$sqlBl."rollno='".$_POST['rollno']."',";
		
		
		
	

	$sqlBl=$sqlBl."status='".$sts."',";
	$sqlBl=$sqlBl."added_by='".$added_by."',";
	$sqlBl=$sqlBl."added_on='".$added_on."'";
	$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
	$UsQuery=mysqli_query($conn,$sqlBl);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/editiddd.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/operation/editiddd.php?msg=error&id='.$_POST['idD']);	
}

?>
