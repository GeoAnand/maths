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

$filephoto1 =$_FILES['img1']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['img1']['tmp_name'], $target_pathphoto1);

 $sql1 =  "select * from eventcat_math where ename='".$_POST['ecat']."'";
$val1 = mysqli_query($conn,$sql1);
$ff=mysqli_fetch_array($val1);

$ecatid=$ff['id'];

 //echo $ecatid. gyi; 
//die(); 

$sql="insert into events_math(ecat,ecatid,etype,ename,img,img1,spe,dat,ab1,ab2,sp1,sp2,guest,place,st,et,elname,el,ref,oc,top,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".$_POST['ecat']."',";
		$sql.="'".$ecatid."',";
	$sql.="'".$_POST['etype']."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['ename'])."',";
	$sql.="'".$fileNamephoto."',";
		$sql.="'".$fileNamephoto1."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['spe'])."',";
	$sql.="'".$_POST['dat']."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['ab1'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['ab2'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['sp1'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['sp2'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['guest'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['place'])."',";
	$sql.="'".$_POST['st']."',";
	$sql.="'".$_POST['et']."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['elname'])."',";
	$sql.="'".$_POST['el']."',";	
	$sql.="'".mysqli_real_escape_string($conn,$_POST['ref'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['oc'])."',";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['top'])."',";
	$sql.="'".$sts."',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
 //echo $sql; 
//die(); 
$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/addevent.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/operation/addevent.php?msg=error');	
}

?>
