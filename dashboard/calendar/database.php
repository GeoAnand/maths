<?php

$servername = 'localhost';
$username = 'iitmadrasbtcm_civiladmin';
$password = 'jayatech@123';
$db = 'iitmadrasbtcm_civiladmin';

$conn = mysqli_connect($servername,$username,$password,$db) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
