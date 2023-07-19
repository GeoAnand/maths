<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  



$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from alumni"));
$fd=$rd['fd']+1;




for($cc=0;$cc<count($_POST['name']);$cc++){
if($_POST['name'][$cc]!=''){
$sq=mysqli_query($conn,"select * from alumni where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$sql="insert into alumni(fuid,fid,deg,year,sno,name,roll,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['deg'])."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['year'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['sno'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['name'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['roll'][$cc])."',";

$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
//die();
$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from alumni where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu=mysqli_fetch_array($sqqu);

$sqlBl="UPDATE alumni SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fid='".mysqli_real_escape_string($conn,$_POST['fid'])."',";
$sqlBl=$sqlBl."deg='".mysqli_real_escape_string($conn,$_POST['deg'])."',";

$sqlBl=$sqlBl."year='".mysqli_real_escape_string($conn,$_POST['year'])."',";

$sqlBl=$sqlBl."sno='".mysqli_real_escape_string($conn,$_POST['sno'][$cc])."',";
$sqlBl=$sqlBl."name='".mysqli_real_escape_string($conn,$_POST['name'][$cc])."',";
$sqlBl=$sqlBl."roll='".mysqli_real_escape_string($conn,$_POST['roll'][$cc])."',";

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

//die();


}





		
		



if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewalumni.php?msg=success&deg='.$_POST['deg'].'&year='.$_POST['year']);
}else{
	header('location:'.$home_path.'/pages/operation/viewalumni.php?msg=error&deg='.$_POST['deg'].'&year='.$_POST['year']);
}

