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

for($cc=0;$cc<count($_POST['title']);$cc++){
if($_POST['title'][$cc]!=''){
$sq=mysqli_query($conn,"select * from gallery where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);


$filephoto =$_FILES['img']['name'][$cc];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['img']['tmp_name'][$cc], $target_pathphoto);


$sql="insert into gallery(img,title,lnk,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".$fileNamephoto."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['title'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['lnk'][$cc])."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{
    
    

$sqqu=mysqli_query($conn,"select * from gallery where id='".$_POST['intid'][$cc]."'");
$rqqu=mysqli_fetch_array($sqqu);


$filephoto =$_FILES['img']['name'][$cc];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['img']['tmp_name'][$cc], $target_pathphoto);


if($filephoto!=''){
$fileNamephotoo=$fileNamephoto;	
}else{
$fileNamephotoo=$rqqu['img'];	
}



$sqlBl="UPDATE gallery SET "; 
$sqlBl=$sqlBl."img='".$fileNamephotoo."',";
$sqlBl=$sqlBl."title='".mysqli_real_escape_string($conn,$_POST['title'][$cc])."',";
$sqlBl=$sqlBl."lnk='".mysqli_real_escape_string($conn,$_POST['lnk'][$cc])."',";
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
	header('location:'.$home_path.'/pages/operation/viewgallery.php?msg=success&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewgallery.php?msg=error&facid='.$_POST['fuid']);
}
		
		

