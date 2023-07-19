<?php
require_once "../config.php";
$added_on=date('Y-m-d h:i:s');
$added_by="";

$clrpic = $_POST['clrpic'];
$title = $_POST['titlee'];
/* $color = $_POST['color']; */
$start = $_POST['start'];

$end = $_POST['end'];

$image = "";
$url = $_POST['url'];

$tme=" 00:00:00";
$st=explode('/',$start);
/* $stD=@$st[2].'-'.@$st[1].'-'.@$st[0].$tme; */
$stD=@$st[2].'-'.@$st[1].'-'.@$st[0];
/* echo $stD;
die(); */
$st1=explode('/',$end);
/* $stD1=@$st1[2].'-'.@$st1[1].'-'.@$st1[0].$tme; */
$stD1=@$st1[2].'-'.@$st1[1].'-'.@$st1[0];

/* $sqr=mysqli_query($conn,"select * from table_type where id='".$_POST['type']."'");
$rqr=mysqli_fetch_array($sqr); */

/* $sql="insert into table_events(title,eventtype,color,start,end,image,url,description,status,added_by,added_on)"; */

$stme=explode(':',$_POST['starttime']);
$etme=explode(':',$_POST['endtime']);

$stmeh=trim($stme[0]);
$stmem=trim($stme[1]);

$etmeh=trim($etme[0]);
$etmem=trim($etme[1]);

$sqlBl="UPDATE events SET "; 
$sqlBl=$sqlBl."evt_start='".$stD."',";
$sqlBl=$sqlBl."evt_end='".$stD1."',";
$sqlBl=$sqlBl."evt_text='".mysqli_real_escape_string($conn,$_POST['titlee'])."',";
$sqlBl=$sqlBl."evt_color='".$_POST['clrpic']."',";
$sqlBl=$sqlBl."title='".mysqli_real_escape_string($conn,$_POST['titlee'])."',";
$sqlBl=$sqlBl."eventtype='".mysqli_real_escape_string($conn,$_POST['type'])."',";
$sqlBl=$sqlBl."starttime='".mysqli_real_escape_string($conn,$_POST['starttime'])."',";
$sqlBl=$sqlBl."starthr='".mysqli_real_escape_string($conn,$stmeh)."',";
$sqlBl=$sqlBl."startmn='".mysqli_real_escape_string($conn,$stmem)."',";
$sqlBl=$sqlBl."endtime='".mysqli_real_escape_string($conn,$_POST['endtime'])."',";
$sqlBl=$sqlBl."endhr='".mysqli_real_escape_string($conn,$etmeh)."',";
$sqlBl=$sqlBl."endmn='".mysqli_real_escape_string($conn,$etmem)."',";
$sqlBl=$sqlBl."image='".$image."',";
$sqlBl=$sqlBl."url='".mysqli_real_escape_string($conn,$_POST['url'])."',";
$sqlBl=$sqlBl."description='".mysqli_real_escape_string($conn,$_POST['description'])."',";
$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where evt_id='".$_POST['idD']."'";

/* echo $sqlBl;
die(); */ 

$UsQuery=mysqli_query($conn,$sqlBl);

if($UsQuery){
	header('location:'.$home_path.'/editevent.php?msg=success&id='.$_POST['idD']);
}else{
	header('location:'.$home_path.'/editevent.php?msg=error&id='.$_POST['idD']);
}

?>
