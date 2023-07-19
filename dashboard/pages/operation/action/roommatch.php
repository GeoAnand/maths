<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$dte=date('d/m/Y');
$dteE=date('Y-m-d h:i:s');

$timef=$_GET['timef'];
$rdate=$_GET['rdate'];
$rname=$_GET['rname'];
$enddtee=$_GET['enddtee'];

$frd=$rdate." ".$timef.":00";

$fr=explode(":",$_GET['timef']);
$fr1=trim($fr[0]);
$fr2=trim($fr[1]);

/*echo "select * from roomreserve where rdate='$rdate' AND rname='".$rname."' AND tfrm>='$fr1' AND ttofrm<='$fr1' AND tto >='$fr2'  AND ttoto>='$fr2' AND status='1'";
$sq1=mysqli_query($conn,"select * from roomreserve where rdate='$rdate' AND rname='".$rname."' AND tfrm>='$fr1' AND ttofrm<='$fr1' AND tto >='$fr2'  AND ttoto>='$fr2' AND status='1'");*/

if($_GET['frmtme']=='frmtme'){
$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$fr1' BETWEEN starthr AND endhr AND evt_start ='$rdate'";
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
$tr1=trim($tr[0]);
$tr2=trim($tr[1]);
$sq1="select * from calevefix where rname='".$_GET['rname']."' AND '$tr1' BETWEEN starthr AND endhr AND evt_start ='$rdate'";
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