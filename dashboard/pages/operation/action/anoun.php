<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from announ"));
$fd=$rd['fd']+1;

for($cc=0;$cc<count($_POST['title']);$cc++){
if($_POST['title'][$cc]!=''){
$sq=mysqli_query($conn,"select * from announ where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$filephoto =$_FILES['pdf']['name'][$cc];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['pdf']['tmp_name'][$cc], $target_pathphoto);

$sql="insert into announ(fuid,fid,ono,title,des,pdf,link,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".'1'."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['ono'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['title'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['des'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$fileNamephoto)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['link'][$cc])."',";

$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from announ where id='".$_POST['intid'][$cc]."'");
$rqqu=mysqli_fetch_array($sqqu);

$filephoto =$_FILES['pdf']['name'][$cc];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['pdf']['tmp_name'][$cc], $target_pathphoto);

if($filephoto!=''){
$fileNamephotoo=$fileNamephoto;	
}else{
$fileNamephotoo=$rqqu['pdf'];	
}

$sqlBl="UPDATE announ SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";

$sqlBl=$sqlBl."ono='".mysqli_real_escape_string($conn,$_POST['ono'][$cc])."',";
$sqlBl=$sqlBl."title='".mysqli_real_escape_string($conn,$_POST['title'][$cc])."',";

$sqlBl=$sqlBl."des='".mysqli_real_escape_string($conn,$_POST['des'][$cc])."',";

$sqlBl=$sqlBl."pdf='".mysqli_real_escape_string($conn,$fileNamephotoo)."',";
$sqlBl=$sqlBl."link='".mysqli_real_escape_string($conn,$_POST['link'][$cc])."',";
$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where  id='".$_POST['intid'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}
}
}
//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/imp-news.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/imp-news.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

