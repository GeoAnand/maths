<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$rd122=mysqli_query($conn,"select * from profile");
while($rw=mysqli_fetch_array($rd122)){
    
$rd12=mysqli_fetch_array(mysqli_query($conn,"select * from faculty where id='".$rw['fuid']."'"));
$fdivision=$rd12['fdivision'];

$fname=trim($rw['fname']);

$sqlBl="UPDATE profile SET "; 
$sqlBl=$sqlBl."fname='".$fname."'";
//$sqlBl=$sqlBl."fdivision='".trim($fdivision)."'";
$sqlBl=$sqlBl." where id='".$rw['id']."'";
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
}