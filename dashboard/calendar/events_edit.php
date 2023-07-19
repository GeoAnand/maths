<?php
require_once "../config.php";
$added_on=date('Y-m-d h:i:s');
$added_by="";

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$image = "";


$sqlBl="UPDATE table_events SET "; 
$sqlBl=$sqlBl."title='".$rq['title']."',";
$sqlBl=$sqlBl."color='".$_POST['color']."',";
$sqlBl=$sqlBl."start='".$_POST['start']."',"; 
$sqlBl=$sqlBl."end='".mysqli_real_escape_string($conn,$_POST['end'])."',"; 
$sqlBl=$sqlBl."image='".$image."',";
$sqlBl=$sqlBl."url='".mysqli_real_escape_string($conn,$_POST['url'])."',";
$sqlBl=$sqlBl."description='".mysqli_real_escape_string($conn,$_POST['description'])."',"; 
$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$dteE."'";
$sqlBl=$sqlBl." where id='".$_POST['idD']."'";
$UsQuery=mysqli_query($conn,$sqlBl); 

/* $sqlUpdate = "UPDATE table_events SET title='" . $title . "',start='" . $start . "',end='" . $end . "' WHERE id=" . $id;
mysqli_query($conn, $sqlUpdate);
mysqli_close($conn); */

?>
