<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  



$file =$_FILES['filebrowse']["name"];

$rwd=mysqli_fetch_array(mysqli_query($conn,"select MAX(blkid)AS bd from purchaseorder"));
$blkid=$rwd['bd']+1;
	
if($file!='')
{
/* start upload */    

/*$IdDd=$_SESSION['userid'];*/  

$temp = explode(".", $_FILES["filebrowse"]["name"]);

$file =$_FILES['filebrowse']["name"];
$filename=$_FILES['filebrowse']["name"];

$ext=substr($filename,strrpos($filename,'.')+1);
$fname=date("Y-m-d-H-i-s")."-";
$fname.='user'.$IdDd."-";
$fname.=$temp[0].".".$ext;
$ext=strtolower($ext);

move_uploaded_file($_FILES["filebrowse"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/dashboard/upload/".$fname);
/* end upload */

copy($_FILES['filebrowse']["tmp_name"], "../../../upload/".$fname);
$count=0;

$stss="1";
$fname = fopen("../../../upload/$fname", "r");
		while (($data = fgetcsv($fname, 8000, ",")) !== FALSE) {
			$num = count($data)-1;
			
		//	$rwd1=mysqli_fetch_array(mysqli_query($conn,"select * from mitem where itemname='".$data[1]."'"));
		//	$rwd2=mysqli_fetch_array(mysqli_query($conn,"select * from mitem where itemname='".$data[2]."'"));
			
if($data[0]!="yr" && $data[1]!="sname" && $data[2]!="rollno" )
{
$apDys="";

$sts="1";
$pid="1";

//$rwd3=mysqli_fetch_array(mysqli_query($conn,"select * from location where locationno='".$data[0]."'"));
//$rwd4=mysqli_fetch_array(mysqli_query($conn,"select * from outlet where id='".$rwd3['outletname']."'"));

$sql ="insert into student(pid,deg,yr,sname,rollno,status,added_by,added_on) VALUES('".$pid."','".$_POST['deg']."','".$data[0]."','".$data[1]."','".$data[2]."','".$sts."','".$added_by."','".$added_on."')";
//echo $sql;
$exQuery=mysqli_query($conn,$sql);
	}
}
 

fclose($file);
}
//die();



if($exQuery){
	header('location:'.$home_path.'/pages/operation/bulkstudent.php?msg=success&fid='.$fd.'&facid='.$_POST['fuid']);
}else{
	header('location:'.$home_path.'/pages/operation/bulkstudent.php?msg=error&fid='.$fd.'&facid='.$_POST['fuid']);
}
		
		

