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
$sql="insert into about(title,des,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".$_POST['title']."',";
	$sql.="'".$_POST['des']."',";
	$sql.="'".$sts."',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
// echo $sql; 
//die(); 
$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/pages/about/addabout.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/about/addabout.php?msg=error');	
}

?>
