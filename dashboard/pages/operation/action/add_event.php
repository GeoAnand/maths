<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$dtdoc=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');
$added_by=$_SESSION['user'];
$added_on=date('Y-m-d h:i:s');
$sts="1";

$clrpic = $_POST['clrpic'];
$title  = $_POST['title'];
$color  = $_POST['color'];
$start  = $_POST['start'];

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

/* $sql="insert into table_events(title,eventtype,color,start,starttime,end,endtime,image,url,description,status,added_by,added_on)"; */

$stme=explode(':',$_POST['starttime']);
$etme=explode(':',$_POST['endtime']);
if($_POST['startampm']=='PM'){
  $stmek=floatval($_POST['starttime1']+12);
}else{
  $stmek=$_POST['starttime1'];  
}
$stmek1=$_POST['starttime2'];
$stmehm=$stmek.':'.$stmek1;

if($_POST['endampm']=='PM'){
 $etmek=floatval($_POST['endtime1']+12); 
}else{
 $etmek=$_POST['endtime1'];   
}
$etmek1=$_POST['endtime2'];

$etmehm=$etmek.':'.$etmek1;

/*$stmeh=trim($stme[0]);
$stmem=trim($stme[1]);

$etmeh=trim($etme[0]);
$etmem=trim($etme[1]);*/
$stmeh=trim($stme[0]);
$stmem=trim($stme[1]);

$etmeh=trim($etme[0]);
$etmem=trim($etme[1]);
$evtgrp="";

$sql="insert into calevefix(rname,ename,evt_start,evt_end,evt_text,evt_color,title,eventtype,eventgrp,starttime,starthr,startmn,startampm,endtime,endhr,endmn,endampm,endhrd,tflg,image,url,description,status,added_by,added_on)";
		$sql.=" values(";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['rname'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['ename'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['start'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['end'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['ename'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$clrpic)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['ename'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['rname'])."',";
		$sql.="'".$evtgrp."',";
		
		
	//	$sql.="'".mysqli_real_escape_string($conn,$_POST['starttime'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$stmehm)."',";
    	$sql.="'".mysqli_real_escape_string($conn,$stmek)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['starttime2'])."',";
		
		
		$sql.="'".mysqli_real_escape_string($conn,$_POST['startampm'])."',";
		
		//$sql.="'".mysqli_real_escape_string($conn,$_POST['endtime'])."',";
		//$sql.="'".mysqli_real_escape_string($conn,$etmeh)."',";
		$sql.="'".mysqli_real_escape_string($conn,$etmehm)."',";
			$sql.="'".mysqli_real_escape_string($conn,$etmek)."',";
				$sql.="'".mysqli_real_escape_string($conn,$_POST['endtime2'])."',";
		
		$sql.="'".mysqli_real_escape_string($conn,$_POST['endampm'])."',";
		$sql.="'".$evtgrp."',";
		$sql.="'".$evtgrp."',";
		$sql.="'".$image."',";
		$sql.="'".$image."',";
		$sql.="'".$image."',";
		$sql.="'1',";
		$sql.="'".$added_by."',";
		$sql.="'".$added_on."')";
		/*echo $sql;
		die(); */
		$UsQuery =mysqli_query($conn,$sql);


if($UsQuery){
	header('location:'.$home_path.'/pages/operation/room.php?msg=success&rcpt=');
}else{
	header('location:'.$home_path.'/pages/operation/room.php?msg=error');	
}

?>
