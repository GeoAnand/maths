<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

/* $rd3=mysqli_fetch_array(mysqli_query($conn,"select * from research where facid='".$_POST['fusrid']."'")); */
$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from research"));
$fd=$rd['fd']+1;

//$sq=mysqli_query($conn,"select * from research where fuid='".$_POST['fuid']."' AND fusrid='".$_POST['fusrid']."'");
$sq=mysqli_query($conn,"select * from research where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$filephoto =$_FILES['fbgd']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['fbgd']['tmp_name'], $target_pathphoto);

$filephoto1 =$_FILES['fcvpht']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['fcvpht']['tmp_name'], $target_pathphoto1);

$filephoto2 =$_FILES['fcvpht1']['name'];
$uploadphoto2=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto2=$filephoto2;
$target_pathphoto2 = $uploadphoto2 .  $fileNamephoto2;
move_uploaded_file($_FILES['fcvpht1']['tmp_name'], $target_pathphoto2);


$filephoto21 =$_FILES['fcvpht2']['name'];
$uploadphoto21=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto21=$filephoto21;
$target_pathphoto2 = $uploadphoto21 .  $fileNamephoto21;
move_uploaded_file($_FILES['fcvpht2']['tmp_name'], $target_pathphoto21);

$filephoto3 =$_FILES['fawdpht']['name'];
$uploadphoto3=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto3=$filephoto3;
$target_pathphoto3 = $uploadphoto3 .  $fileNamephoto3;
move_uploaded_file($_FILES['fawdpht']['tmp_name'], $target_pathphoto3);

$sql="insert into research(fuid,fid,fusrid,fusrname,fusremail,fcvpht,fcvpht1,fcvpht2,fdesc,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$rd1['name'])."',";
$sql.="'".mysqli_real_escape_string($conn,$rd1['username'])."',";

$sql.="'".$fileNamephoto1."',";

$sql.="'".$fileNamephoto2."',";

$sql.="'".$fileNamephoto21."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['fdesc'])."',";

$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{

//$sqqu=mysqli_query($conn,"select * from research where fuid='".$_POST['fuid']."' AND fusrid='".$_POST['fusrid']."'");
$sqqu=mysqli_query($conn,"select * from research where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu=mysqli_fetch_array($sqqu);


$filephoto =$_FILES['fbgd']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['fbgd']['tmp_name'], $target_pathphoto);

$filephoto1 =$_FILES['fcvpht']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['fcvpht']['tmp_name'], $target_pathphoto1);

$filephoto2 =$_FILES['fcvpht1']['name'];
$uploadphoto2=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto2=$filephoto2;
$target_pathphoto2 = $uploadphoto2 .  $fileNamephoto2;
move_uploaded_file($_FILES['fcvpht1']['tmp_name'], $target_pathphoto2);

$filephoto21 =$_FILES['fcvpht2']['name'];
$uploadphoto21=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto21=$filephoto21;
$target_pathphoto21 = $uploadphoto21 .  $fileNamephoto21;
move_uploaded_file($_FILES['fcvpht2']['tmp_name'], $target_pathphoto21);




$filephoto3 =$_FILES['fawdpht']['name'];
$uploadphoto3=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto3=$filephoto3;
$target_pathphoto3 = $uploadphoto3 .  $fileNamephoto3;
move_uploaded_file($_FILES['fawdpht']['tmp_name'], $target_pathphoto3);

if($filephoto!=''){
$fileNamephotoo=$fileNamephoto;	
}else{
$fileNamephotoo=$rqqu['fbgd'];	
}

if($filephoto1!=''){
$fileNamephotoo1=$fileNamephoto1;	
}else{
$fileNamephotoo1=$rqqu['fcvpht'];	
}

if($filephoto2!=''){
$fileNamephotoo2=$fileNamephoto2;	
}else{
$fileNamephotoo2=$rqqu['fcvpht1'];	
}


if($filephoto21!=''){
$fileNamephotoo21=$fileNamephoto21;	
}else{
$fileNamephotoo21=$rqqu['fcvpht2'];	
}

if($filephoto3!=''){
$fileNamephotoo3=$fileNamephoto3;	
}else{
$fileNamephotoo3=$rqqu['fawdpht'];	
}

$sqlBl="UPDATE research SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fusrid='".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";


$sqlBl=$sqlBl."fcvpht='".$fileNamephotoo1."',";

$sqlBl=$sqlBl."fcvpht1='".$fileNamephotoo2."',";

$sqlBl=$sqlBl."fcvpht2='".$fileNamephotoo21."',";

$sqlBl=$sqlBl."fdesc='".mysqli_real_escape_string($conn,$_POST['fdesc'])."',";

$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'";
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}

//die();
/* if($_POST['pemail']!=''){
	$ed=explode("@",$_POST['pemail']);
	$edd=$ed[0];
}else if($_POST['pemail1']!=''){
	$ed=explode("@",$_POST['pemail1']);
	$edd=$ed[0];
}

$sqlBl1="UPDATE faculty SET "; 
$sqlBl1=$sqlBl1."phone='".$_POST['pmobile']."',";
$sqlBl1=$sqlBl1."email='".$_POST['pemail']."',";
$sqlBl1=$sqlBl1."email1='".$_POST['pemail1']."'";
$sqlBl1=$sqlBl1." where foldername='".$edd."'";
$UsQuery=mysqli_query($conc,$sqlBl1); */

//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/research.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/research.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

