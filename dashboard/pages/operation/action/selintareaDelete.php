<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
/* $added_by=$_SESSION['userid']; */

   /*  $blkpdf="";
    $sqlBl1u="UPDATE profileintareas SET ";
    $sqlBl1u=$sqlBl1u."fbgd='".$blkpdf."'";
    $sqlBl1u=$sqlBl1u." where id='".$_GET['delid']."'";
    $UsQuery=mysqli_query($conn,$sqlBl1u); */

$sqd="delete from profileintareas";
$sqd=$sqd." where id='".$_GET['id']."' AND fuid='".$_GET['facid']."'";
/*  echo $sqd;
 die(); */
$UsQuery=mysqli_query($conn,$sqd);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewareas.php?msg=success&fid='.$fd.'&facid='.$_GET['facid']);
}else{
	header('location:'.$home_path.'/pages/operation/viewareas.php?msg=error&fid='.$fd.'&facid='.$_GET['facid']);
}

/* if($UsQuery){
   echo 1; 
}else{
   echo 2; 
} */
	
?>



