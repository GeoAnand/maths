<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
/* $added_by=$_SESSION['userid']; */

if(isset($_GET['pge']) && $_GET['pge']=='img'){
    $blkpdf="";
    $sqlBl1u="UPDATE events SET ";
    $sqlBl1u=$sqlBl1u."img='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}elseif(isset($_GET['pge']) && $_GET['pge']=='img1'){
    $blkpdf="";
    $sqlBl1u="UPDATE events SET ";
    $sqlBl1u=$sqlBl1u."img1='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}

if($UsQuery){
   echo 1; 
}else{
   echo 2; 
}
	
?>



