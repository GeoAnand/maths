<?php
ob_start();
session_start();
include("config.php");
$dteE=date('Y-m-d h:i:s');

$sq2=mysqli_fetch_array(mysqli_query($conn,"select * from user where username='".$_POST['username']."'"));
$id=$sq2['id'];

require 'PHPMailer/PHPMailerAutoload.php';
$mail= new PHPMailer();
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth='true';

$mail->Username='infotest@jytheme.com';
$mail->Password='dhiksha@123';

/*
$mail->Username='infotheme@jytheme.com';
$mail->Password='dhiksha@123';
*/

/*
redhdproductions@gmail.com
$mail->Username='info@redhdproductions.com';
$mail->Password='Redhdproductions@123';
jeyamravip@gmail.com
*/

$srcb=$home_path.'/resetpass.php?id='.$id;  
$srcb1=$home_path.'/resetpass.php';  

$mail->SMTPSecure='tls';
$mail->Port=587;
$mail->SetFrom('infotest@jytheme.com','Admin');
$mail->addAddress('jeyamravip@gmail.com');
//$mail->AddCC('dineshuk88@gmail.com', '');
$mail->addReplyTo('infotest@jytheme.com','Info');
$mail->isHTML(true);
//$mail->addAttachment('1.jpeg','new.jpeg');
$mail->Subject='Department of Physics, IIT - Chennai';
$mail->Body='<table align="center" border="1" cellspacing="10" cellpadding="10" width="100%" style="background:#e9754a; margin-top:10px; border:1px solid #e8e8e8; -moz-border-radius:7px; -webkit-border-radius: 7px; -khtml-border-radius: 7px; border-radius: 7px;color:#fff;">
<tbody>
<tr>
<td colspan="2" style="font-weight:bold;text-align:center;font-size:17px;">Reset Password</td>
</tr>
<tr>
<td style="width:250px;"><a href="'.$srcb.'" style="color:blue;">'.$srcb1.'</a>
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
  //header('location:thanks.php?msg=success&cont=reser');
}
else
{
  //header('location:thanks.php?msg=error&cont=reser'); 
}
die();

$sq=mysqli_query($conn,"select * from user where username='".$_POST['username']."'");
if(mysqli_num_rows($sq)>0){
    $rw=mysqli_fetch_array($sq);
    echo 1;
}else{
    echo 2;
}

