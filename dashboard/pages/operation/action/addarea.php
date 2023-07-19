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

for($cc=0;$cc<count($_POST['intareas']);$cc++){
if($_POST['intareas'][$cc]!=''){
$sq=mysqli_query($conn,"select * from profileintareas where fuid='".$_POST['fuid']."' AND id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$sql="insert into profileintareas(fuid,fid,fusrid,intareas,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['intareas'][$cc])."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from profileintareas where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu=mysqli_fetch_array($sqqu);

$sqlBl="UPDATE profileintareas SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fusrid='".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sqlBl=$sqlBl."intareas='".mysqli_real_escape_string($conn,$_POST['intareas'][$cc])."',";
$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where fuid='".$_POST['fuid']."' AND id='".$_POST['intid'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}
}
}
//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewareas.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewareas.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

