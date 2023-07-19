<?php
require_once "../config.php";
$added_on=date('Y-m-d h:i:s');
$added_by="";

$title = $_POST['title'];

$sql="insert into table_type(title,status,added_by,added_on)";
	$sql.=" values(";
	$sql.="'".mysqli_real_escape_string($conn,$_POST['title'])."',";
	$sql.="'1',";
	$sql.="'".$added_by."',";
	$sql.="'".$added_on."')";
	/* echo $sql;
	die(); */
	$UsQuery =mysqli_query($conn,$sql);
		
/* $sqlInsert = "INSERT INTO table_events (title,start,end) VALUES ('".$title."','".$start."','".$end ."')";
$result = mysqli_query($conn, $sqlInsert); */

/* if (! $result) {
    $result = mysqli_error($conn);
} */

if($UsQuery){
	header('location:'.$home_path.'/calendarca.php?msg=success');
}else{
	header('location:'.$home_path.'/calendarca.php?msg=error');
}

?>
