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




$sqqu=mysqli_query($conn,"select * from postdoc where id='".$_POST['idD']."'");
$rqqu=mysqli_fetch_array($sqqu);


$filephoto =$_FILES['img']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['img']['tmp_name'], $target_pathphoto);


if($filephoto!=''){
$fileNamephotoo=$fileNamephoto;	
}else{
$fileNamephotoo=$rqqu['img'];	
}





	$sqlBl="UPDATE postdoc SET ";
	$sqlBl=$sqlBl."pid='".$pid."',";
	$sqlBl=$sqlBl."prename='".$_POST['prename']."',";
	$sqlBl=$sqlBl."name='".$_POST['name']."',";

	$sqlBl=$sqlBl."phn='".$_POST['phn']."',";
	$sqlBl=$sqlBl."ofz='".$_POST['ofz']."',";
	$sqlBl=$sqlBl."email='".$_POST['email']."',";
		$sqlBl=$sqlBl."men='".$_POST['men']."',";
	$sqlBl=$sqlBl."img='".$fileNamephotoo."',";
	$sqlBl=$sqlBl."type='".$_POST['type']."',";
	$sqlBl=$sqlBl."link='".$_POST['link']."',";
	$sqlBl=$sqlBl."status='".$sts."',";
	$sqlBl=$sqlBl."added_by='".$added_by."',";
	$sqlBl=$sqlBl."added_on='".$added_on."'";
	$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
	$UsQuery=mysqli_query($conn,$sqlBl);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/editpost.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/operation/editpost.php?msg=error&id='.$_POST['idD']);	
}

?>
