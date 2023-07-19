<?php
ob_start();
session_start();
include("config.php");
$dteE=date('Y-m-d h:i:s');

//echo "select * from user where username='".$_POST['username']."'";
//die();
$sq2=mysqli_fetch_array(mysqli_query($conn,"select * from user where username='".$_POST['username']."'"));
$id=$sq2['id'];

$blk="";

$username=$_POST['username'];

$typ="forgot";
$sql="insert into forgotpass(username,forgeton,resetnpass,resetcpass,reseton,typ)";
$sql.=" values(";
$sql.="'".$_POST['username']."',";
$sql.="'".$dteE."',";
$sql.="'".$blk."',";
$sql.="'".$blk."',";
$sql.="'".$blk."',";
$sql.="'".$typ."')";
/* echo $sql; 
die(); */
$UsQuery =mysqli_query($conn,$sql); 

$sq=mysqli_query($conn,"select * from user where username='".$_POST['username']."'");
if(mysqli_num_rows($sq)>0){
    $rw=mysqli_fetch_array($sq);
   

	
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
$mail->Subject='Department of Physics, IIT - Chennai';
$mail->Body='<table align="center" border="1" cellspacing="10" cellpadding="10" width="100%" style="background:#7f241e;margin-top:10px; border:1px solid #e8e8e8; -moz-border-radius:7px; -webkit-border-radius: 7px; -khtml-border-radius: 7px; border-radius: 7px;color:#fff;">
<tbody>
<tr>
<td colspan="2" style="font-weight:bold;text-align:center;font-size:17px;">Reset Password</td>
</tr>
<tr>
<td style="width:250px;"><a href="'.$srcb.'" style="background-color:blue;color:#fff;">'.$srcb1.'</a>
</td>
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
  header('location:forgotthank.php?msg=success&cont=forgot');
}
else
{
  //header('location:forgotthank.php?msg=error&cont=forgot'); 
 echo $error = "Mailer Error: " . $mail->ErrorInfo;
}
 //echo 1;
}else{
     header('location:forgot.php?msg=error&cont=forgot'); 
}





