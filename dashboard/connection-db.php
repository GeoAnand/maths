<?php
ob_start();
session_start();
include("config.php");
$dteE=date('Y-m-d h:i:s');

$sql=mysqli_query($conn,"select * from user where username='".$_POST['username']."'");
$result=mysqli_fetch_array($sql);
$username= $result['username'];
$password= $result['password']; 
$status= $result['status']; 

$UserNme=$_POST['username'];
$passWrd=$_POST['password'];

//echo "hgjhg ";
//die();
//echo $passWrd;
$dtey= date('Y');

$dteyy=date("y");
	
	if(isset($_POST['submit'])){
		
		if($UserNme==$username && $password==$passWrd && $status=='1'){
			$sqlD=mysqli_query($conn,"select * from user where username='".$UserNme."'");
			$resD=mysqli_fetch_array($sqlD);
			$usertype=$resD['usertype'];
		$_SESSION['user']=$UserNme;
		$_SESSION['name']=$resD['name'];
		$_SESSION['uid']=$resD['id'];
		header('location:dashboard.php');
		}else{	
		header('location:index.php?msg=Login Failed...');		
		}	
	}
?>
