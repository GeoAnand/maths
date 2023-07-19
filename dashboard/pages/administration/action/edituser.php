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

if($_POST['name']!=''){
    $usertype='faculty';
    
}else{
     $usertype='';
}

$sq21 = mysqli_fetch_array(mysqli_query($conn,"select * from faculty where fname='".$_POST['name']."'"));

$sq2 = mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['idD']."'"));

$sqlBl="UPDATE user SET ";
$sqlBl=$sqlBl."username='".$_POST['username']."',";
$sqlBl=$sqlBl."password='".$_POST['password']."',";
$sqlBl=$sqlBl."facid='".$sq21['id']."',";

$sqlBl=$sqlBl."name='".$_POST['name']."',";
$sqlBl=$sqlBl."address='".$_POST['address']."',";
$sqlBl=$sqlBl."phoneno='".$_POST['phoneno']."',";
$sqlBl=$sqlBl."status='".$sts."',";
$sqlBl=$sqlBl."added_by='".$added_by."',";
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
//$UsQuery=mysqli_query($conn,$sqlBl);

 //echo $sqlBl; 
//die(); 
$UsQuery =mysqli_query($conn,$sqlBl);

if($UsQuery){
	header('location:'.$home_path.'/pages/administration/edituser.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/administration/edituser.php?msg=error');	
}

?>
