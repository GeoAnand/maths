<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
/* $added_by=$_SESSION['userid']; */

if(isset($_GET['pge']) && $_GET['pge']=='fcvpht'){
    $blkpdf="";
    $sqlBl1u="UPDATE profile SET ";
    $sqlBl1u=$sqlBl1u."fcvpht='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else if(isset($_GET['pge']) && $_GET['pge']=='fcvatt'){
    $blkpdf="";
    $sqlB1u="UPDATE profile SET ";
    $sqlB1u=$sqlB1u."fcvatt='".$blkpdf."'";
    $sqlB1u=$sqlB1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlB1u);
}
if($UsQuery){
   echo 1; 
}else{
   echo 2; 
}
	
?>



