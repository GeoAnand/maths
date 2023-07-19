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




$sqqu=mysqli_query($conn,"select * from events where id='".$_POST['idD']."'");
$rqqu=mysqli_fetch_array($sqqu);


$filephoto =$_FILES['img']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['img']['tmp_name'], $target_pathphoto);

$filephoto1 =$_FILES['img1']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['img1']['tmp_name'], $target_pathphoto1);


if($filephoto!=''){
$fileNamephotoo=$fileNamephoto;	
}else{
$fileNamephotoo=$rqqu['img'];	
}

if($filephoto1!=''){
$fileNamephotoo1=$fileNamephoto1;	
}else{
$fileNamephotoo1=$rqqu['img1'];	
}


$sql1 =  "select * from eventcat_math where ename='".$_POST['ecat']."'";
$val1 = mysqli_query($conn,$sql1);
$f=mysqli_fetch_array($val1);

$ecatid=$f['id'];


	$sqlBl="UPDATE events SET ";
	
	$sqlBl=$sqlBl."ecat='".$_POST['ecat']."',";
$sqlBl=$sqlBl."ecatid='".$ecatid."',";
	$sqlBl=$sqlBl."etype='".$_POST['etype']."',";
	$sqlBl=$sqlBl."ename='".mysqli_real_escape_string($conn,$_POST['ename'])."',";
		$sqlBl=$sqlBl."img='".$fileNamephotoo."',";
		$sqlBl=$sqlBl."img1='".$fileNamephotoo1."',";
	$sqlBl=$sqlBl."spe='".mysqli_real_escape_string($conn,$_POST['spe'])."',";
		$sqlBl=$sqlBl."dat='".$_POST['dat']."',";
		$sqlBl=$sqlBl."ab1='".mysqli_real_escape_string($conn,$_POST['ab1'])."',";
		$sqlBl=$sqlBl."ab2='".mysqli_real_escape_string($conn,$_POST['ab2'])."',";
		
		$sqlBl=$sqlBl."sp1='".mysqli_real_escape_string($conn,$_POST['sp1'])."',";
		
		$sqlBl=$sqlBl."sp2='".mysqli_real_escape_string($conn,$_POST['sp2'])."',";
		
		$sqlBl=$sqlBl."guest='".mysqli_real_escape_string($conn,$_POST['guest'])."',";
		
		$sqlBl=$sqlBl."place='".mysqli_real_escape_string($conn,$_POST['place'])."',";
		
		$sqlBl=$sqlBl."st='".$_POST['st']."',";
		
		$sqlBl=$sqlBl."et='".$_POST['et']."',";
		
		$sqlBl=$sqlBl."elname='".mysqli_real_escape_string($conn,$_POST['elname'])."',";
		
		$sqlBl=$sqlBl."el='".mysqli_real_escape_string($conn,$_POST['el'])."',";
		
		$sqlBl=$sqlBl."ref='".mysqli_real_escape_string($conn,$_POST['ref'])."',";
		
		$sqlBl=$sqlBl."oc='".mysqli_real_escape_string($conn,$_POST['oc'])."',";
		
		$sqlBl=$sqlBl."top='".$_POST['top']."',";

	$sqlBl=$sqlBl."status='".$sts."',";
	$sqlBl=$sqlBl."added_by='".$added_by."',";
	$sqlBl=$sqlBl."added_on='".$added_on."'";
	$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
	$UsQuery=mysqli_query($conn,$sqlBl);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/editevent.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/pages/operation/editevent.php?msg=error&id='.$_POST['idD']);	
}

?>
