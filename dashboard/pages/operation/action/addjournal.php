<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from profilejournal"));
$fd=$rd['fd']+1;

for($cc=0;$cc<count($_POST['jauthor']);$cc++){
if($_POST['jauthor'][$cc]!=''){
//echo    "select * from profilejournal where fuid='".$_POST['fuid']."' AND id='".$_POST['intid'][$cc]."'"; 
//echo "select * from profilejournal where fuid='".$_POST['fuid']."' AND id='".$_POST['intid'][$cc]."'";


$sqqu=mysqli_query($conn,"select * from profilejournal where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu=mysqli_fetch_array($sqqu);

$sqlBl="UPDATE profilejournal SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
//$sqlBl=$sqlBl."fusrid='".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sqlBl=$sqlBl."fusrid='".mysqli_real_escape_string($conn,$added_by)."',";
$sqlBl=$sqlBl."jauthor='".mysqli_real_escape_string($conn,$_POST['jauthor'][$cc])."',";
$sqlBl=$sqlBl."jdesc='".mysqli_real_escape_string($conn,$_POST['jdesc'][$cc])."',";
$sqlBl=$sqlBl."jcitedesc='".mysqli_real_escape_string($conn,$_POST['jcitedesc'][$cc])."',";

$sqlBl=$sqlBl."volume='".mysqli_real_escape_string($conn,$_POST['volume'][$cc])."',";
$sqlBl=$sqlBl."page='".mysqli_real_escape_string($conn,$_POST['page'][$cc])."',";
$sqlBl=$sqlBl."doi='".mysqli_real_escape_string($conn,$_POST['doi'][$cc])."',";
$sqlBl=$sqlBl."doilnk='".mysqli_real_escape_string($conn,$_POST['doilnk'][$cc])."',";
$sqlBl=$sqlBl."ar='".mysqli_real_escape_string($conn,$_POST['ar'][$cc])."',";
$sqlBl=$sqlBl."arlnk='".mysqli_real_escape_string($conn,$_POST['arlnk'][$cc])."',";
$sqlBl=$sqlBl."lnk='".mysqli_real_escape_string($conn,$_POST['lnk'][$cc])."',";
$sqlBl=$sqlBl."year='".mysqli_real_escape_string($conn,$_POST['year'][$cc])."',";
$sqlBl=$sqlBl."status='1'"; 
//$sqlBl=$sqlBl."added_by='".$added_by."',"; 
//$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where fuid='".$_POST['fuid']."' AND id='".$_POST['intid'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	

}
}
//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewjournal.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewjournal.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

