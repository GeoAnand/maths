<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from profile"));
$fd=$rd['fd']+1;

$sq=mysqli_query($conn,"select * from profile where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
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

$filephoto2 =$_FILES['fcvatt']['name'];
$uploadphoto2=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto2=$filephoto2;
$target_pathphoto2 = $uploadphoto2 .  $fileNamephoto2;
move_uploaded_file($_FILES['fcvatt']['tmp_name'], $target_pathphoto2);

$filephoto3 =$_FILES['fawdpht']['name'];
$uploadphoto3=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto3=$filephoto3;
$target_pathphoto3 = $uploadphoto3 .  $fileNamephoto3;
move_uploaded_file($_FILES['fawdpht']['tmp_name'], $target_pathphoto3);

$sql="insert into profile(fuid,fid,fusrid,	fusrname,fusremail,fname,femail,femail1,fmobile,fbgd,fcvpht,fcvatt,fweblink,fawdpht,fdesc,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$rd1['name'])."',";
$sql.="'".mysqli_real_escape_string($conn,$rd1['username'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fname'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['femail'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['femail1'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fmobile'])."',";
$sql.="'".$fileNamephoto."',";
$sql.="'".$fileNamephoto1."',";
$sql.="'".$fileNamephoto2."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fweblink'])."',";
$sql.="'".$fileNamephoto3."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fdesc'])."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{

//$sqqu=mysqli_query($conn,"select * from profile where fuid='".$_POST['fuid']."' AND fusrid='".$_POST['fusrid']."'");
$sqqu=mysqli_query($conn,"select * from profile where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
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

$filephoto2 =$_FILES['fcvatt']['name'];
$uploadphoto2=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto2=$filephoto2;
$target_pathphoto2 = $uploadphoto2 .  $fileNamephoto2;
move_uploaded_file($_FILES['fcvatt']['tmp_name'], $target_pathphoto2);

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
$fileNamephotoo2=$rqqu['fcvatt'];	
}

if($filephoto3!=''){
$fileNamephotoo3=$fileNamephoto3;	
}else{
$fileNamephotoo3=$rqqu['fawdpht'];	
}

$sqlBl="UPDATE profile SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fusrid='".mysqli_real_escape_string($conn,$_POST['fusrid'])."',";
$sqlBl=$sqlBl."fname='".mysqli_real_escape_string($conn,$_POST['fname'])."',";
$sqlBl=$sqlBl."femail='".mysqli_real_escape_string($conn,$_POST['femail'])."',";
$sqlBl=$sqlBl."femail1='".mysqli_real_escape_string($conn,$_POST['femail1'])."',";
$sqlBl=$sqlBl."fmobile='".mysqli_real_escape_string($conn,$_POST['fmobile'])."',";
$sqlBl=$sqlBl."fbgd='".$fileNamephotoo."',";
$sqlBl=$sqlBl."fcvpht='".$fileNamephotoo1."',";
$sqlBl=$sqlBl."fcvatt='".$fileNamephotoo2."',";
$sqlBl=$sqlBl."fweblink='".mysqli_real_escape_string($conn,$_POST['fweblink'])."',";
$sqlBl=$sqlBl."fawdpht='".$fileNamephotoo3."',";
$sqlBl=$sqlBl."fdesc='".mysqli_real_escape_string($conn,$_POST['fdesc'])."',";
$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'";
echo $sqlBl; 
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
	header('location:'.$home_path.'/pages/operation/viewprofile.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewprofile.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

