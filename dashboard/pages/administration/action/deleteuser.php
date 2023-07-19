<?php
ob_start();
session_start();
include("../../../config.php");
$added_by=$_SESSION['user'];
$dte=date('d/m/Y');
$dteE=date('Y-m-d h:i:s');
$added_on=date('Y-m-d h:i:s');

$itm=$_GET['id'];

$sql="delete from user";
$sql=$sql." where id='".$_GET['id']."'";
$UsQLk=mysqli_query($conn,$sql);

if($UsQLk){
	header('location:'.$home_path.'/pages/administration/viewuser.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/administration/viewuser.php?msg=error&id='.$_POST['idD']);	
}




?>


		

