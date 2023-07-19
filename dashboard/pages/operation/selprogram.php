<?php
include("../../config.php");
$rcd="";$rcd1="";
//echo "select * from programcat where deg='".$_GET['deg']."' group by year ORDER BY convert(`deg`, decimal) ASC";;
$rcd.='<option value="">-- Select Year Name --</option>';
$sql = "select * from programcat where deg='".$_GET['deg']."' group by year ORDER BY convert(`deg`, decimal) ASC";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
$rcd.='<option value='.$fetch['id'].'>'.$fetch['year'].'</option>';
} 


$rcd1.='<option value="">-- Select Semester --</option>';
$sql1 = "select * from programcat where deg='".$_GET['deg']."' group by sem  ORDER BY convert(`sem`, decimal) ASC";
//echo $sql1;
$val1 = mysqli_query($conn,$sql1);
while($fetch1=mysqli_fetch_array($val1))
{ 
    
$sql1=mysqli_query($conn,"select * from semester where id='".$fetch1['sem']."'");
$fetch3=mysqli_fetch_array($sql1); 

$rcd1.='<option value='.$fetch1['sem'].'>'.$fetch3['sem'].'</option>';
}

echo $rcd."&#".$rcd1;

?>