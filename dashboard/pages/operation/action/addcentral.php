<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from profileintareas"));
$fd=$rd['fd']+1;

for($cc=0;$cc<count($_POST['lnkname']);$cc++){
if($_POST['lnkname'][$cc]!=''){
$sq=mysqli_query($conn,"select * from central where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$sql="insert into central(lnkname,lnkl,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['lnkname'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['lnkl'][$cc])."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from central where id='".$_POST['intid'][$cc]."'");
$rqqu=mysqli_fetch_array($sqqu);

$sqlBl="UPDATE central SET "; 
$sqlBl=$sqlBl."lnkname='".mysqli_real_escape_string($conn,$_POST['lnkname'][$cc])."',";
$sqlBl=$sqlBl."lnkl='".mysqli_real_escape_string($conn,$_POST['lnkl'][$cc])."',";
$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where id='".$_POST['intid'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}
}
}
//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewcentral.php?msg=success&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewcentral.php?msg=error&facid='.$_POST['fuid']);
}
		
		

