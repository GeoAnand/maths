<?php
session_start();
ob_start();
error_reporting(0);
include("../../config.php");

$dte=date('d/m/Y');
$dteE=date('Y-m-d h:i:s');

$idd=$_GET['idd'];
//echo "dsds".$idd;
$dyy=$_GET['dy'];
$calmonth=$_GET['calmonth'];
$calyear=$_GET['calyear'];
$rname1=$_GET['rname'];

$cyr=$calyear.'-'.$calmonth.'-'.$dyy;


$dyyy = sprintf("%02d", $dyy);
$calm = sprintf("%02d", $calmonth);
$caly = sprintf("%02d", $calyear);
$dte=$caly.'-'.$calm.'-'.$dyyy;

$dysdd = date("F", strtotime($dte));
$dys = date("M", strtotime($dte));
$dys1 = date("D", strtotime($dte));
$dys2 = date("d", strtotime($dte));

if(isset($rname1) && $rname1!=''){
$s1="select * from calevefix WHERE  '$dte' between evt_start and evt_end AND rname='".$rname1."'";    
}else{
$s1="select * from calevefix WHERE '$dte' between evt_start and evt_end";    
}
//echo $s1;
$sqqu=mysqli_query($conn,$s1);
$evt_id="";
while($rq=mysqli_fetch_array($sqqu)){
	$evt_id.=$rq['evt_id'].',';
}
$recNo=rtrim($evt_id,',');
$starttime=$rq['starttime'];
$endtime=$rq['endtime'];
$st=explode(":",$starttime);
$en=explode(":",$endtime);
$evt_text=$rq['evt_text'];
$description=$rq['description'];

//echo $recNo;
$hid_regnu=$recNo;
$hidR=trim($hid_regnu, ',');
$rmNSpt=explode(',',$hidR);
$startt="";
$endt="";
for($ia=0;$ia<count($rmNSpt);$ia++) {
//echo "select * from calevefix WHERE evt_id='".$rmNSpt[$ia]."' ORDER BY convert(`starttime`, decimal) DESC";
$sqqu=mysqli_query($conn,"select * from calevefix WHERE evt_id='".$rmNSpt[$ia]."' ORDER BY convert(`starttime`, decimal) DESC");
$rq=mysqli_fetch_array($sqqu);
$stt1=explode(":",$rq['starttime']);
$startt.=$stt1[0].',';
$end1=explode(":",$rq['endtime']);
$endt.=$end1[0].',';
}

$startt1=rtrim($startt,',');	
$endt1=rtrim($endt,',');

$xyz1 = $startt1;
$uniqueStr = implode(',', array_unique(explode(',', $xyz1)));
$array1 = array_filter(array_map('trim', explode(',', $uniqueStr)));
asort($array1);
$array1 = implode(',', $array1);
$arrayy1 = array($array1);

$xyz2 = $endt1;
$uniqueStr1 = implode(',', array_unique(explode(',', $xyz2)));
$array2 = array_filter(array_map('trim', explode(',', $uniqueStr1)));
asort($array2);
$array2 = implode(',', $array2);
$arrayy2 = array($array2);

$array12= $array1.','.$array2 ;
$uniqueStr12 = implode(',', array_unique(explode(',', $array12)));
$array21 = array_filter(array_map('trim', explode(',', $uniqueStr12)));
asort($array21);
$array21 = implode(',', $array21);

$numbers = explode(',', $array21);
$lastNumber = end($numbers);
$firstNumber = $numbers[0];
?>

<tr><td id="ddt" style="width:61px;font-weight:bold;font-size:18px;"><?php echo $dysdd; ?></td><td id="ddt">&nbsp;<span  style="font-weight:bold;font-size:18px;"><?php echo ucwords($dys1); ?></span><br><span style="font-weight:bold;font-size:38px;"><?php echo $dyyy; ?></span></td></tr>
<?php 
//for($cc=8;$cc<=20;$cc++){
$dtm=$cc.':'.'00';
$dtmd=$cc.':'.'00';
$tme=date("h:i a", strtotime($dtm));
$tme1=date("h a", strtotime($dtm));

$ccc="24";
$num = sprintf("%02d", $cc);
/*if(isset($rname1) && $rname1!=''){
$sqqu12="select * from calevefix WHERE '$num' BETWEEN starthr AND endhr AND '$dte' between evt_start and evt_end AND rname='".$rname1."' ORDER BY convert(`starttime`, decimal) DESC";
}else{
$sqqu12="select * from calevefix WHERE '$num' BETWEEN starthr AND endhr AND '$dte' between evt_start and evt_end ORDER BY convert(`starttime`, decimal) DESC";    
}
*/
if(isset($rname1) && $rname1!=''){
$sqqu12="select * from calevefix WHERE  '$dte' between evt_start and evt_end AND rname='".$rname1."'";    
}else{
$sqqu12="select * from calevefix WHERE '$dte' between evt_start and evt_end";   
}
//echo $sqqu12;
$sqqu1=mysqli_query($conn,$sqqu12);
$nmd=mysqli_num_rows($sqqu1);
$end12="";
while($sq12=mysqli_fetch_array($sqqu1)){

$sq212=mysqli_fetch_array(mysqli_query($conn,"select * from addroom where id='".$sq12['rname']."'"));

$sq1=mysqli_query($conn,"select * from calendaruser where username='".$_SESSION['usercal']."'");
$rq1=mysqli_fetch_array($sq1);
$usertype=$rq1['usertype'];
$eventgrp=$rq1['eventgrp'];

 /*if(isset($_SESSION['usercal']) && $_SESSION['usercal']!=''){
	 if($sq12['url']!='' && $sq12['description']!=''){
        $end12.=$sq12['title'].', <a href=//'.$sq12['url'].' style="color:blue;" target="_blank">'.$sq12['url'].'</a>, '.$sq12['description'].' | '; 
     }else if($sq12['url']=='' && $sq12['description']!=''){
        $end12.=$sq12['title'].', '.$sq12['description'].' | ';  
     }else if($sq12['url']=='' && $sq12['description']==''){
        $end12.=$sq12['title'].' | ';  
     }else{
        $end12.=$sq12['title'].', <a href=//'.$sq12['url'].' style="color:blue;" target="_blank">'.$sq12['url'].'</a>, '.$sq12['description'].' | ';  
     }
 }else{*/
 
if($sq12['startampm']=='PM'){
  $stmek=floatval($sq12['starthr']-12);
  $stmekk=$stmek.":".$sq12['startmn'];
}else{
  $stmek=$sq12['starthr'];
  $stmekk=$stmek.":".$sq12['startmn'];
}

if($sq12['endampm']=='PM'){
  $stmeke=floatval($sq12['endhr']-12);
  $stmekee=$stmeke.":".$sq12['endmn'];
}else{
  $stmeke=$sq12['endhr'];
  $stmekee=$stmeke.":".$sq12['endmn'];
}

 
 
     $end12.=$sq212['rname'].", ".$sq12['title']." from ".$sq12['evt_start']."  ".$stmek.": ".$sq12['startmn']." ".$sq12['startampm']." to ".$sq12['evt_end']." ".$stmeke.": ".$sq12['endmn']." ".$sq12['endampm'].' <span style="color:black;" target="_blank">'.'</span>'.$sq12['description'].' | '.'</span>'.$sq12['added_by'];
     
     $end121=$sq212['rname'].", ".$sq12['title']." from ".$sq12['evt_start']."  ".$stmek.": ".$sq12['startmn']." ".$sq12['startampm']." to ".$sq12['evt_end']." ".$stmeke.": ".$sq12['endmn']." ".$sq12['endampm'].' <span style="color:black;" target="_blank">'.'</span>'.$sq12['description'].' | '.'</span>'.$sq12['added_by'];  
     
 //}
 
 $dd=$stmekk.' '.$sq12['startampm'].' - '.$stmekee.' '.$sq12['endampm'];
?>



<tr><td style="text-align:center;"><?php echo strtoupper($dd); ?></td><td><?php echo $end121; ?></td></tr>
<?php
}
for($cc=$nmd;$cc<=9;$cc++){ ?>
<tr><td style="text-align:center;">&nbsp;</td><td>&nbsp;</td></tr>
<?php }
$recNo=rtrim($end12,' | ');	
?>

<?php //} ?>

