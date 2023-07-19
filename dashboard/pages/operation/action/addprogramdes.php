<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  

$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from programnewdes"));
$fd=$rd['fd']+1;

/*echo "select * from programnewdes where id='".$_POST['intid']."'";
die();*/
$sq=mysqli_query($conn,"select * from programnewdes where id='".$_POST['intid']."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$rw1=mysqli_fetch_array(mysqli_query($conn,"select * from programcat where id='".$_POST['year']."'"));


$filephoto =$_FILES['syll']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['syll']['tmp_name'], $target_pathphoto);

$filephoto1 =$_FILES['cur']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['cur']['tmp_name'], $target_pathphoto1);

$filephoto2 =$_FILES['ele']['name'];
$uploadphoto2=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto2=$filephoto2;
$target_pathphoto2 = $uploadphoto2 .  $fileNamephoto2;
move_uploaded_file($_FILES['ele']['tmp_name'], $target_pathphoto2);



$sql="insert into programnewdes(fuid,fid,deg,po,process,sp,syll,cur,ele,note1,note2,note3,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['deg'])."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['po'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['process'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['sp'])."',";
$sql.="'".$fileNamephoto."',";
$sql.="'".$fileNamephoto1."',";
$sql.="'".$fileNamephoto2."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['note1'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['note2'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['note3'])."',";


$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";


 //echo $sql; 


$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from programnewdes where id='".$_POST['intid']."'");
$rqqu=mysqli_fetch_array($sqqu);


$filephoto =$_FILES['syll']['name'];
$uploadphoto=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto=$filephoto;
$target_pathphoto = $uploadphoto .  $fileNamephoto;
move_uploaded_file($_FILES['syll']['tmp_name'], $target_pathphoto);

$filephoto1 =$_FILES['cur']['name'];
$uploadphoto1=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto1=$filephoto1;
$target_pathphoto1 = $uploadphoto1 .  $fileNamephoto1;
move_uploaded_file($_FILES['cur']['tmp_name'], $target_pathphoto1);

$filephoto2 =$_FILES['ele']['name'];
$uploadphoto2=$_SERVER['DOCUMENT_ROOT'].$download_path; 
$fileNamephoto2=$filephoto2;
$target_pathphoto2 = $uploadphoto2 .  $fileNamephoto2;
move_uploaded_file($_FILES['ele']['tmp_name'], $target_pathphoto2);


if($filephoto!=''){
$fileNamephotoo=$fileNamephoto;	
}else{
$fileNamephotoo=$rqqu['syll'];	
}

if($filephoto1!=''){
$fileNamephotoo1=$fileNamephoto1;	
}else{
$fileNamephotoo1=$rqqu['cur'];	
}

if($filephoto2!=''){
$fileNamephotoo2=$fileNamephoto2;	
}else{
$fileNamephotoo2=$rqqu['ele'];	
}



$sqlBl="UPDATE programnewdes SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fid='".mysqli_real_escape_string($conn,$_POST['fid'])."',";
$sqlBl=$sqlBl."deg='".mysqli_real_escape_string($conn,$_POST['deg'])."',";

$sqlBl=$sqlBl."po='".mysqli_real_escape_string($conn,$_POST['po'])."',";

$sqlBl=$sqlBl."process='".mysqli_real_escape_string($conn,$_POST['process'])."',";
$sqlBl=$sqlBl."sp='".mysqli_real_escape_string($conn,$_POST['sp'])."',";
$sqlBl=$sqlBl."syll='".$fileNamephotoo."',";
$sqlBl=$sqlBl."cur='".$fileNamephotoo1."',";
$sqlBl=$sqlBl."ele='".$fileNamephotoo2."',";

$sqlBl=$sqlBl."note1='".mysqli_real_escape_string($conn,$_POST['note1'])."',";
$sqlBl=$sqlBl."note2='".mysqli_real_escape_string($conn,$_POST['note2'])."',";
$sqlBl=$sqlBl."note3='".mysqli_real_escape_string($conn,$_POST['note3'])."',";

$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where  id='".$_POST['intid']."'";
//echo $sqlBl; 
 //echo $sqlBl; 
//die(); 
$UsQuery=mysqli_query($conn,$sqlBl);
	

}
//die();

if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewprogramdes.php?msg=success&deg='.$_POST['deg']);
}else{
	header('location:'.$home_path.'/pages/operation/viewprogramdes.php?msg=error&deg='.$_POST['deg']);
}
		
		

