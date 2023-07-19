<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$added_on=date('Y-m-d h:i:s');
$pid="1";
$sts="1";



$filephoto =$_FILES['img']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['img']['tmp_name'], $target_pathphoto);







$sql="insert into postdoc(pid,prename,name,phn,ofz,email,men,img,type,link,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".$pid."',";
	$sql.="'".$_POST['prename']."',";
	$sql.="'".$_POST['name']."',";
	$sql.="'".$_POST['phn']."',";
	$sql.="'".$_POST['ofz']."',";
	$sql.="'".$_POST['email']."',";
	$sql.="'".$_POST['men']."',";
	$sql.="'".$fileNamephoto."',";
	$sql.="'".$_POST['type']."',";
	$sql.="'".$_POST['link']."',";
	$sql.="'".$sts."',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
// echo $sql; 
//die(); 
$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/addpost.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/operation/addpost.php?msg=error');	
}

?>
