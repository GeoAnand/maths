<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

for($cc=0;$cc<count($_POST['ono']);$cc++){
if($_POST['ono'][$cc]!=''){
$sq=mysqli_query($conn,"select * from slider where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$filephoto =$_FILES['img']['name'][$cc];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['img']['tmp_name'][$cc], $target_pathphoto);


$sql="insert into slider(ono,img,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['ono'][$cc])."',";
$sql.="'".$fileNamephoto."',";
$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;
$UsQuery =mysqli_query($conn,$sql);
 
}else{
    
    

$sqqu=mysqli_query($conn,"select * from slider where id='".$_POST['intid'][$cc]."'");
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



$sqlBl="UPDATE slider SET "; 
$sqlBl=$sqlBl."ono='".mysqli_real_escape_string($conn,$_POST['ono'][$cc])."',";
$sqlBl=$sqlBl."img='".$fileNamephotoo."',";
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
	header('location:'.$home_path.'/pages/operation/slider.php?msg=success&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/slider.php?msg=error&facid='.$_POST['fuid']);
}
		
		

