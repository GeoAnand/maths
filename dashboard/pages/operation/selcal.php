<?php
session_start();
ob_start();
error_reporting(0);
include("../../config.php");

$_SESSION['rname']=$_POST['rname1'];


?>