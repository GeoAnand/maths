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

$sql="insert into oppr(pid,title,article_content,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".$sts."',";
	$sql.="'".$_POST['title']."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['article_content'])."',";
    $sql.="'".$sts."',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
//echo $sql; 
//die();


$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/offers.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/operation/offers.php?msg=error');	
}

?>
