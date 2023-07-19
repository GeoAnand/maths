<?php
ob_start();
session_start();
include("config.php");
$dteE=date('Y-m-d h:i:s');

//echo "select * from user where username='".$_POST['username']."'";
//die();

$sq2=mysqli_fetch_array(mysqli_query($conn,"select * from user where id='".$_POST['resetid']."'"));
$id=$sq2['id'];
$username=ucwords($sq2['username']);
$name=ucwords($sq2['name']);


$blk="";

$username=$username;
$typ="reset";
$sql="insert into forgotpass(username,forgeton,resetnpass,resetcpass,reseton,typ)";
$sql.=" values(";
$sql.="'".$username."',";
$sql.="'".$dteE."',";
$sql.="'".$_POST['npassword']."',";
$sql.="'".$_POST['cpassword']."',";
$sql.="'".$dteE."',";
$sql.="'".$typ."')";
/* echo $sql; 
die(); */
$UsQuery =mysqli_query($conn,$sql); 

if($_POST['resetnpass']==$_POST['resetcpass']){
$slBl="UPDATE user SET ";
$slBl=$slBl."password='".$_POST['resetnpass']."'";
$slBl=$slBl." where id='".$id."' AND username='".$username."'";
 //echo $slBl; 
 //die();
$UsQuery =mysqli_query($conn,$slBl); 
	
require 'PHPMailer/PHPMailerAutoload.php';
$mail= new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth='true';
$mail->Host='smtp.iitm.ac.in';


$mail->Username='phoffice1';
$mail->Password='iitM@chennai';
$mail->SMTPDebug  = 2;


$srcb=$home_path1.'/resetpass.php?id='.$id;  
$srcb1=$home_path1.'/resetpass.php';  

$mail->SMTPSecure='tls';
$mail->Port=25;
$mail->SetFrom('phoffice@iitm.ac.in','Admin');
$mail->addAddress($username);

$mail->addReplyTo('phoffice@iitm.ac.in','Info');
$mail->isHTML(true);
//$mail->addAttachment('1.jpeg','new.jpeg');
$mail->Subject='Department of Physics, IIT - Chennai. Forgot password recovery.';
$mail->Body='<table align="center" border="1" cellspacing="10" cellpadding="10" width="100%" style="background:#e9754a; margin-top:10px; border:1px solid #e8e8e8; -moz-border-radius:7px; -webkit-border-radius: 7px; -khtml-border-radius: 7px; border-radius: 7px;color:#fff;">
<tbody>
<tr>
<td colspan="2" style="font-weight:bold;text-align:center;font-size:17px;">Dear '.$name.',</td>
</tr>
<tr>
<td colspan="2" style="font-weight:bold;text-align:center;font-size:17px;">Your request to reset forgotten password has been completed successfully. Your New Password '.$_POST['resetnpass'].'</td>
</tr>
<tr>
<td colspan="2" style="font-weight:bold;text-align:center;font-size:17px;">Your user id is '.$username.'.</td>
</tr>

<tr>
    <td colspan="2">
<br/><br/>
Thank you.
<br/>
Regards,<br/>
Department of Physics, IIT - Chennai
		</td>
</tr>		
</tbody>
</table>';

if($mail->send())
{
  header('location:forgotthank.php?msg=success&cont=reset');
}
else
{
  header('location:forgotthank.php?msg=error&cont=reset'); 
}

}

die();



