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
$sq=mysqli_query($conn,"select * from profilejournal where fuid='".$_POST['fuid']."' AND id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$sql="insert into profilejournal(fuid,fid,fusrid,jauthor,jdesc,jcitedesc,volume,page,doi,doilnk,ar,arlnk,lnk,year,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
//$sql.="'".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$added_by)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['jauthor'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['jdesc'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['jcitedesc'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['volume'][$cc])."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['page'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['doi'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['doilnk'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['ar'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['arlnk'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['lnk'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['year'][$cc])."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}

    
}
}
//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/addjournal.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/addjournal.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

