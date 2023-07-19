<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$added_on=date('Y-m-d h:i:s');



$filephoto =$_FILES['photo']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['photo']['tmp_name'], $target_pathphoto);


	$sqlBl="UPDATE dcf SET ";
	$sqlBl=$sqlBl."title='".$_POST['title']."',";
	$sqlBl=$sqlBl."content='".$_POST['content']."',";
	$sqlBl=$sqlBl."photo='".$fileNamephoto."',";
		$sqlBl=$sqlBl."contact='".$_POST['contact']."',";
	$sqlBl=$sqlBl."added_by='".$added_by."',";
	$sqlBl=$sqlBl."added_on='".$added_on."'";
	$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
	$UsQuery=mysqli_query($conn,$sqlBl);

//echo $sql; 
//die(); 

if($UsQuery){
	header('location:'.$home_path.'/pages/about/editdcf.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/about/editdcf.php?msg=error&id='.$_POST['idD']);	
}

?>
