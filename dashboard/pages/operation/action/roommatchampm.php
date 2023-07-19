<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$dte=date('d/m/Y');
$dteE=date('Y-m-d h:i:s');


$timehr=$_GET['timehr'];
$timemin=$_GET['timemin'];
$timetmin=$_GET['timetmin'];
$rdate=$_GET['rdate'];
$rname=$_GET['rname'];
$enddtee=$_GET['enddtee'];
$startampm=$_GET['startampm'];



/*
$timef=$_GET['timehr'];
$rdate=$_GET['rdate'];
$rname=$_GET['rname'];
$enddtee=$_GET['enddtee'];
*/
$timef=$timehr.':'.$timemin;
$frd=$rdate." ".$timef.":00";

$fr=explode(":",$_GET['timef']);
/*$fr1=trim($fr[0]);*/
if($startampm=='PM'){
    $timehrd=floatval($timehr+12);
    $timehrdd = sprintf("%02d", $timehrd);
}else{
    $timehrd=floatval($timehr);
    $timehrdd = sprintf("%02d", $timehrd);
}
$fr1=trim($timehrdd);
$fr2=trim($fr[1]);

$tod=$timehrd.":".$timemin;

/*echo "select * from roomreserve where rdate='$rdate' AND rname='".$rname."' AND tfrm>='$fr1' AND ttofrm<='$fr1' AND tto >='$fr2'  AND ttoto>='$fr2' AND status='1'";
$sq1=mysqli_query($conn,"select * from roomreserve where rdate='$rdate' AND rname='".$rname."' AND tfrm>='$fr1' AND ttofrm<='$fr1' AND tto >='$fr2'  AND ttoto>='$fr2' AND status='1'");
select * from calevefix where rname='1' AND '18' BETWEEN starthr AND endhr AND '05' BETWEEN startmn AND endmn AND evt_start ='2023-02-11'
*/

if($_GET['frmtme']=='frmtme'){
//select * from calevefix where rname='1' AND '17:16' BETWEEN starttime AND endtime AND evt_start ='2023-02-16'
//$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$fr1' BETWEEN starthr AND endhr  AND '$timemin' BETWEEN startmn AND endmn AND evt_start ='$rdate'";
$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$tod' BETWEEN starttime AND endtime AND evt_start ='$rdate'";
//echo $sq1;
$sq2=mysqli_query($conn,$sq1);
if(mysqli_num_rows($sq2)>0){
    echo 1;    
}else{
    echo 2;
}
}

//echo $_GET['frmtme'];

if($_GET['frmtme']=='totme'){
//echo $_GET['frmtme'];
//die();
$tr=explode(":",$_GET['timet']);

if($_GET['endampm']=='PM'){
    $tr1d=floatval($_GET['timethr']+12);
     $tr1 = sprintf("%02d", $tr1d);
}else{
    $tr1d=floatval($_GET['timethr']);
    $tr1 = sprintf("%02d", $tr1d);
}

//$tr1=trim($tr[0]);
//$tr1=trim($_GET['timethr']);
$tr2=trim($tr[1]);

//$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$fr1' BETWEEN starthr AND endhr  AND '$timemin' BETWEEN startmn AND endmn AND evt_start ='$rdate'";

$tod=$tr1d.":".$timetmin;

//$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$tr1' BETWEEN starthr AND endhr AND '$timetmin' BETWEEN startmn AND endmn AND evt_start ='$rdate'";

//$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$tr1' BETWEEN starthr AND endhr AND '$timetmin' BETWEEN startmn AND endmn AND evt_start ='$rdate'";

$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$tod' BETWEEN starttime AND endtime AND evt_end ='$rdate'";
//echo $sq1;
//$sq1="select * from calevefix where rname='".$_GET['rname']."' AND  '$tr1' BETWEEN starthr AND endhr AND rdate ='$evt_start'";
//echo $sq1;
$sq2=mysqli_query($conn,$sq1);
if(mysqli_num_rows($sq2)>0){
    echo 1;    
}else{
    echo 2;
}
}

?>