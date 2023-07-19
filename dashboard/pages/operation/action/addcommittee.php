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

for($cc=0;$cc<count($_POST['name']);$cc++){
if($_POST['name'][$cc]!=''){
$sq=mysqli_query($conn,"select * from committees where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$sql="insert into committees(title,topic,name,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['title'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['topic'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['name'][$cc])."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from committees where id='".$_POST['intid'][$cc]."'");
$rqqu=mysqli_fetch_array($sqqu);

$sqlBl="UPDATE committees SET "; 
$sqlBl=$sqlBl."title='".mysqli_real_escape_string($conn,$_POST['title'])."',";
$sqlBl=$sqlBl."topic='".mysqli_real_escape_string($conn,$_POST['topic'][$cc])."',";
$sqlBl=$sqlBl."name='".mysqli_real_escape_string($conn,$_POST['name'][$cc])."',";
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
	header('location:'.$home_path.'/pages/operation/addcommittee.php?msg=success&title='.$_POST['title']);
}else{
	header('location:'.$home_path.'/pages/operation/addcommittee.php?msg=error&title='.$_POST['title']);
}
		
		

