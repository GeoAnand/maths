<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$added_on=date('Y-m-d h:i:s');
$sts="1";


$filephoto1 =$_FILES['photo']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['photo']['tmp_name'], $target_pathphoto1);


$sql="insert into dcf(title,content,photo,contact,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".$_POST['title']."',";
	$sql.="'".$_POST['content']."',";
	$sql.="'".$fileNamephoto1."',";
		$sql.="'".$_POST['contact']."',";
	$sql.="'".$sts."',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
// echo $sql; 
//die(); 
$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/pages/about/adddcf.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/about/adddcf.php?msg=error');	
}

?>
