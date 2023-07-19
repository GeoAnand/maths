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

$fr=explode(":",$_POST['timef']);
$fr1=trim($fr[0]);
$fr2=trim($fr[1]);

$tr=explode(":",$_POST['timet']);
$tr1=trim($fr[0]);
$tr2=trim($fr[1]);

$sql="insert into roomreserve(pid,rname,ename,rdate,timef,starthr,startmin,timet,endhr,endmin,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".$sts."',";
	$sql.="'".$_POST['rname']."',";
	$sql.="'".$_POST['ename']."',";
	$sql.="'".$_POST['rdate']."',";
    $sql.="'".$_POST['timef']."',";
    $sql.="'".$fr1."',";
    $sql.="'".$fr2."',";
    $sql.="'".$_POST['timet']."',";
    $sql.="'".$tr1."',";
    $sql.="'".$tr2."',";
	$sql.="'".$sts."',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
 //echo $sql; 
//die(); 
$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/room-reserve.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/operation/room-reserve.php?msg=error');	
}

?>
