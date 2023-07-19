<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
/* $added_by=$_SESSION['userid']; */

if(isset($_GET['pge']) && $_GET['pge']=='syll'){
    $blkpdf="";
    $sqlBl1u="UPDATE programnewdes SET ";
    $sqlBl1u=$sqlBl1u."syll='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else
if(isset($_GET['pge']) && $_GET['pge']=='cur'){
    $blkpdf="";
    $sqlBl1u="UPDATE programnewdes SET ";
    $sqlBl1u=$sqlBl1u."cur='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else
if(isset($_GET['pge']) && $_GET['pge']=='ele'){
    $blkpdf="";
    $sqlBl1u="UPDATE programnewdes SET ";
    $sqlBl1u=$sqlBl1u."ele='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}

if($UsQuery){
   echo 1; 
}else{
   echo 2; 
}
	
?>



