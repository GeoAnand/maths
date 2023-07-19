<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$sqd="delete from calevefix";
$sqd=$sqd." where evt_id='".$_GET['id']."'";
  //echo $sqd;
 //die(); 
$UsQuery=mysqli_query($conn,$sqd);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/room.php?msg=delsuccess&id='.$fd);
}else{
	header('location:'.$home_path.'/pages/operation/room.php?msg=delerror&id='.$fd);
}

/* if($UsQuery){
   echo 1; 
}else{
   echo 2; 
} */
	
?>



