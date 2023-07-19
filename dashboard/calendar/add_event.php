<?php
require_once "../config.php";
$added_on=date('Y-m-d h:i:s');
$added_by="";

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

$stmeh=trim($stme[0]);
$stmem=trim($stme[1]);

$etmeh=trim($etme[0]);
$etmem=trim($etme[1]);


$slHn=mysqli_query($conn,"select * from gennext where field='eventgrp'");
$rwHn=mysqli_fetch_array($slHn);
$prefix=$rwHn['prefix'];
/* $currvalue=str_pad($rwHn['currvalue']+1,5,"0",STR_PAD_LEFT ); */
$currvalue=$rwHn['currvalue']+1;
$rcpt=$prefix.$currvalue;
if($etmem>0){
    $tflg="1";
    $etmemm=$etmeh+1;
}else{
    $tflg="";
    $etmemm="";
}


$sql="insert into events(evt_start,evt_end,evt_text,evt_color,title,eventtype,eventgrp,starttime,starthr,startmn,endtime,endhr,endmn,endhrd,tflg,image,url,description,status,added_by,added_on)";
		$sql.=" values(";
		$sql.="'".mysqli_real_escape_string($conn,$stD)."',";
		$sql.="'".mysqli_real_escape_string($conn,$stD1)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['titlee'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$clrpic)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['titlee'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['type'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$rcpt)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['starttime'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$stmeh)."',";
		$sql.="'".mysqli_real_escape_string($conn,$stmem)."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['endtime'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$etmeh)."',";
		$sql.="'".mysqli_real_escape_string($conn,$etmem)."',";
		$sql.="'".mysqli_real_escape_string($conn,$etmemm)."',";
		$sql.="'".mysqli_real_escape_string($conn,$tflg)."',";
		$sql.="'".mysqli_real_escape_string($conn,$image )."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['url'])."',";
		$sql.="'".mysqli_real_escape_string($conn,$_POST['description'])."',";
		$sql.="'1',";
		$sql.="'".$added_by."',";
		$sql.="'".$added_on."')";
		/* echo $sql;
		die(); */
		$UsQuery =mysqli_query($conn,$sql);
		
		$lstid=mysqli_insert_id($conn);
		
for($cc=0;$cc<count($_POST['email']);$cc++){
	$dd="";
	$sqld="insert into calendaruser(category,subcategory,username,firstname,fid,userpass,usermail,usertype,eventid,eventgrp,status,added_by,added_on)";
		$sqld.=" values(";
		$sqld.="'".mysqli_real_escape_string($conn,$dd)."',";
		$sqld.="'".mysqli_real_escape_string($conn,$dd)."',";
		$sqld.="'".mysqli_real_escape_string($conn,$_POST['email'][$cc])."',";
		$sqld.="'".mysqli_real_escape_string($conn,$_POST['firstname'][$cc])."',";
		$sqld.="'".mysqli_real_escape_string($conn,$dd)."',";
		$sqld.="'".mysqli_real_escape_string($conn,$_POST['password'][$cc])."',";
		$sqld.="'".mysqli_real_escape_string($conn,$_POST['email'][$cc])."',";
		$sqld.="'".mysqli_real_escape_string($conn,$_POST['type'])."',";
		$sqld.="'".$lstid."',";
		$sqld.="'".$rcpt."',";
		$sqld.="'1',";
		$sqld.="'".$added_by."',";
		$sqld.="'".$added_on."')";
		/* echo $sqld;
		die(); */
		$UsQuery =mysqli_query($conn,$sqld);
}		
		

if($UsQuery){
	
$sqlLk="UPDATE gennext SET ";
$sqlLk=$sqlLk."currvalue='".$currvalue."'";
$sqlLk=$sqlLk." where field='eventgrp'" ;
$UsQLk =mysqli_query($conn,$sqlLk); 

	header('location:'.$home_path.'/calendarca.php');
}else{
	header('location:'.$home_path.'/calendarca.php?msg=error');
}
		
/* $sqlInsert = "INSERT INTO table_events (title,start,end) VALUES ('".$title."','".$start."','".$end ."')";
$result = mysqli_query($conn, $sqlInsert); */
/* 
if (! $result) {
    $result = mysqli_error($conn);
} */

?>
