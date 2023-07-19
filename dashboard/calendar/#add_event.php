<?php
require_once "../config.php";
$added_on=date('Y-m-d h:i:s');
$added_by="";

$clrpic = $_POST['clrpic'];
$title = $_POST['title'];
$color = $_POST['color'];
$start = $_POST['start'];

$end = $_POST['end'];

$image = "";
$url = $_POST['url'];

$tme=" 00:00:00";
$st=explode('/',$start);
$stD=@$st[2].'-'.@$st[1].'-'.@$st[0].$tme;
/* echo $stD;
die(); */
$st1=explode('/',$end);
$stD1=@$st1[2].'-'.@$st1[1].'-'.@$st1[0].$tme;

$sqr=mysqli_query($conn,"select * from table_type where id='".$_POST['title']."'");
$rqr=mysqli_fetch_array($sqr);

$sql="insert into table_events(title,eventtype,color,start,starttime,end,endtime,image,url,description,status,added_by,added_on)";
		$sql.=" values(";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['titlee'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['type'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$clrpic)."',";
		$sql.="'".mysqli_real_escape_string($conn,$stD)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['starttime'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$stD1)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['endtime'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$image )."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['url'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['description'])."',";
		$sql.="'1',";
		$sql.="'".$added_by."',";
		$sql.="'".$added_on."')";
		/* echo $sql;
		die(); */
		$UsQuery =mysqli_query($conn,$sql);

if($UsQuery){
	header('location:'.$home_path.'/calendar.php?msg=success');
}else{
	header('location:'.$home_path.'/calendar.php?msg=error');
}

		
/* $sqlInsert = "INSERT INTO table_events (title,start,end) VALUES ('".$title."','".$start."','".$end ."')";
$result = mysqli_query($conn, $sqlInsert); */
/* 
if (! $result) {
    $result = mysqli_error($conn);
} */

?>
