<?php
ob_start();
session_start();
include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');
$added_by=$_SESSION['uid'];

$loc='';  



$rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['fusrid']."'"));

$rd=mysqli_fetch_array(mysqli_query($conn,"select MAX(fid)AS fd from programidddnew"));
$fd=$rd['fd']+1;




for($cc=0;$cc<count($_POST['cname']);$cc++){
if($_POST['cname'][$cc]!=''){
$sq=mysqli_query($conn,"select * from programidddnew where id='".$_POST['intid'][$cc]."'");
if(mysqli_num_rows($sq)==0){
$rq=mysqli_fetch_array($sq);

$rw1=mysqli_fetch_array(mysqli_query($conn,"select * from programcat where id='".$_POST['year']."'"));





$sql="insert into programidddnew(fuid,fid,deg,sem,cno,cname,credit,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['deg'])."',";

$sql.="'".mysqli_real_escape_string($conn,$_POST['sem'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['cno'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['cname'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['credit'][$cc])."',";

$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;

$UsQuery =mysqli_query($conn,$sql);
 
}else{

$sqqu=mysqli_query($conn,"select * from programidddnew where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu=mysqli_fetch_array($sqqu);

$sqlBl="UPDATE programidddnew SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fid='".mysqli_real_escape_string($conn,$_POST['fid'])."',";
$sqlBl=$sqlBl."deg='".mysqli_real_escape_string($conn,$_POST['deg'])."',";

$sqlBl=$sqlBl."sem='".mysqli_real_escape_string($conn,$_POST['sem'])."',";

$sqlBl=$sqlBl."cno='".mysqli_real_escape_string($conn,$_POST['cno'][$cc])."',";
$sqlBl=$sqlBl."cname='".mysqli_real_escape_string($conn,$_POST['cname'][$cc])."',";
$sqlBl=$sqlBl."credit='".mysqli_real_escape_string($conn,$_POST['credit'][$cc])."',";

$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where id='".$_POST['intid'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}
}

//die();


}









//Winter //


for($cc=0;$cc<count($_POST['wcno']);$cc++){
if($_POST['wcno'][$cc]!=''){
    
if($_POST['wcno'][$cc]!='' || $_POST['wcname'][$cc]!='' || $_POST['wcredit'][$cc]!=''){
$win="winter";
}else{
$win=""; 
}

$sq1=mysqli_query($conn,"select * from programidddnewwin where id='".$_POST['intid1'][$cc]."'");
if(mysqli_num_rows($sq1)==0){
$rq1=mysqli_fetch_array($sq1);

$rw11=mysqli_fetch_array(mysqli_query($conn,"select * from programcat where id='".$_POST['year']."'"));

$sql="insert into programidddnewwin(fuid,fid,deg,sem,win,wcno,wcname,wcredit,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['deg'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['sem'])."',";
$sql.="'".$win."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['wcno'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['wcname'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['wcredit'][$cc])."',";

$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;

$UsQuery=mysqli_query($conn,$sql);
 
}else{

$sqqu1=mysqli_query($conn,"select * from programidddnewwin where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu1=mysqli_fetch_array($sqqu1);

$sqlBl="UPDATE programidddnewwin SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fid='".mysqli_real_escape_string($conn,$_POST['fid'])."',";
$sqlBl=$sqlBl."deg='".mysqli_real_escape_string($conn,$_POST['deg'])."',";
$sqlBl=$sqlBl."sem='".mysqli_real_escape_string($conn,$_POST['sem'])."',";

$sqlBl=$sqlBl."win='".$win."',";

$sqlBl=$sqlBl."wcno='".mysqli_real_escape_string($conn,$_POST['wcno'][$cc])."',";
$sqlBl=$sqlBl."wcname='".mysqli_real_escape_string($conn,$_POST['wcname'][$cc])."',";
$sqlBl=$sqlBl."wcredit='".mysqli_real_escape_string($conn,$_POST['wcredit'][$cc])."',";

$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where  id='".$_POST['intid1'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}
}
//die();



}






//Summer //

for($cc=0;$cc<count($_POST['scno']);$cc++){
if($_POST['scno'][$cc]!=''){
    
if($_POST['scno'][$cc]!='' || $_POST['scname'][$cc]!='' || $_POST['scredit'][$cc]!=''){
    $smr="summer";
}else{
   $smr=""; 
}

$sq12=mysqli_query($conn,"select * from programidddnewsmr where id='".$_POST['intid2'][$cc]."'");
if(mysqli_num_rows($sq1)==0){
$rq12=mysqli_fetch_array($sq1);

$rw112=mysqli_fetch_array(mysqli_query($conn,"select * from programcat where id='".$_POST['year']."'"));


$sql="insert into programidddnewsmr(fuid,fid,deg,sem,smr,scno,scname,scredit,status,added_by,added_on)";
$sql.=" values(";
$sql.="'".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sql.="'".mysqli_real_escape_string($conn,$fd)."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['deg'])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['sem'])."',";

$sql.="'".$smr."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['scno'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['scname'][$cc])."',";
$sql.="'".mysqli_real_escape_string($conn,$_POST['scredit'][$cc])."',";

$sql.="'1',";
$sql.="'".$added_by."',";
$sql.="'".$added_on."')";
//echo $sql;

$UsQuery=mysqli_query($conn,$sql);
 
}else{

$sqqu12=mysqli_query($conn,"select * from programidddnewsmr where fid='".$_POST['fid']."' AND fuid='".$_POST['fuid']."'");
$rqqu12=mysqli_fetch_array($sqqu12);

$sqlBl="UPDATE programidddnewsmr SET "; 
$sqlBl=$sqlBl."fuid='".mysqli_real_escape_string($conn,$_POST['fuid'])."',";
$sqlBl=$sqlBl."fid='".mysqli_real_escape_string($conn,$_POST['fid'])."',";
$sqlBl=$sqlBl."deg='".mysqli_real_escape_string($conn,$_POST['deg'])."',";
$sqlBl=$sqlBl."sem='".mysqli_real_escape_string($conn,$_POST['sem'])."',";

$sqlBl=$sqlBl."smr='".$smr."',";

$sqlBl=$sqlBl."scno='".mysqli_real_escape_string($conn,$_POST['scno'][$cc])."',";
$sqlBl=$sqlBl."scname='".mysqli_real_escape_string($conn,$_POST['scname'][$cc])."',";
$sqlBl=$sqlBl."scredit='".mysqli_real_escape_string($conn,$_POST['scredit'][$cc])."',";



$sqlBl=$sqlBl."status='1',"; 
$sqlBl=$sqlBl."added_by='".$added_by."',"; 
$sqlBl=$sqlBl."added_on='".$added_on."'";
$sqlBl=$sqlBl." where id='".$_POST['intid2'][$cc]."'";
//echo $sqlBl; 
/* echo $sqlBl; 
die(); */
$UsQuery=mysqli_query($conn,$sqlBl);
	
}

}




		
}		



if($UsQuery){
	header('location:'.$home_path.'/pages/operation/viewidddprogram.php?msg=success&deg='.$_POST['deg'].'&sem='.$_POST['sem']);
}else{
	header('location:'.$home_path.'/pages/operation/viewidddprogram.php?msg=error&deg='.$_POST['deg'].'&sem='.$_POST['sem']);
}

