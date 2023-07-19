<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
/* $added_by=$_SESSION['userid']; */

if(isset($_GET['pge']) && $_GET['pge']=='fbgd'){
    $blkpdf="";
    $sqlBl1u="UPDATE research SET ";
    $sqlBl1u=$sqlBl1u."fbgd='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else if(isset($_GET['pge']) && $_GET['pge']=='fcvpht'){
    $blkpdf="";
    $sqlBl1u="UPDATE research SET ";
    $sqlBl1u=$sqlBl1u."fcvpht='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else if(isset($_GET['pge']) && $_GET['pge']=='fcvpht1'){
    $blkpdf="";
    $sqlBl1u="UPDATE research SET ";
    $sqlBl1u=$sqlBl1u."fcvpht1='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else if(isset($_GET['pge']) && $_GET['pge']=='fcvpht2'){
    $blkpdf="";
    $sqlBl1u="UPDATE research SET ";
    $sqlBl1u=$sqlBl1u."fcvpht2='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}else if(isset($_GET['pge']) && $_GET['pge']=='fawdpht'){
    $blkpdf="";
    $sqlBl1u="UPDATE research SET ";
    $sqlBl1u=$sqlBl1u."fawdpht='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u);
}

if($UsQuery){
   echo 1; 
}else{
   echo 2; 
}
	
?>



