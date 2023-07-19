<?php
ob_start();
session_start();


include("../../../config.php");
$dte=date('d/m/Y');
$added_on=date('Y-m-d h:i:s');

$dted=date('Y-m-d');
$dteE=date('Y-m-d h:i:s');

$timef=$_GET['timef'];
$rdate=$_GET['rdate'];
$rname=$_GET['rname'];

$frd=$rdate." ".$timef.":00";

$fr=explode(":",$_GET['timef']);
$fr1=trim($fr[0]);
$fr2=trim($fr[1]);

if($rname!=''){
$sqlr = mysqli_query($conn,"select * from addroom where id='".$rname."'");
$fet=mysqli_fetch_array($sqlr); 

$sq1="select * from roomreserve where rname='".$rname."' AND rdate >= '$dted'";
$sq2=mysqli_query($conn,$sq1);
if(mysqli_num_rows($sq2)>0){
   while($rw=mysqli_fetch_array($sq2)){
?>
       
<tr>
<td><?php echo $fet['rname']; ?></td>
<td><?php echo $rw['rdate']; ?><br>
<?php echo $rw['timef']; ?>&nbsp; <?php echo $rw['timet']; ?>
</td>
<td><?php echo $rw['ename']; ?></td>
<td><?php echo $rw['added_by']; ?></td>

</tr>
   
   <?php                     
       
   }
}else{ ?>
     <tr>
        <td><?php echo $fetchr1['rname']; ?></td>
        <td colspan="3">There are currently no bookings for this hall</td>
    </tr>
 <?php  } ?>
<?php
    
}else{
    
    
 $sql=mysqli_query($conn,"select * from roomreserve where status='1'");

$added_by=$_SESSION['user'];
while($rw=mysqli_fetch_array($sql))
   
{
  $sqlr = "select * from addroom where id='".$rw['rname']."'";
$valr = mysqli_query($conn,$sqlr);
$fetchr=mysqli_fetch_array($valr); 
?>
<tr>
                          <td><?php echo $fetchr['rname']; ?></td>
                          <td><?php echo $rw['rdate']; ?><br>
                          <?php echo $rw['timef']; ?>&nbsp; <?php echo $rw['timet']; ?>
                          </td>
                          <td><?php echo $rw['ename']; ?></td>
                          <td><?php echo $rw['added_by']; ?></td>
                        
                        </tr>
<?php
}


$sqlr1 = "select * from addroom where id NOT IN (select rname from roomreserve )";
$valr1 = mysqli_query($conn,$sqlr1);
while($fetchr1=mysqli_fetch_array($valr1))
{
 ?>
 <tr>
        <td><?php echo $fetchr1['rname']; ?></td>
        <td colspan="3">There are currently no bookings for this hall</td>
    </tr>   
<?php    
}

    
    
    
    
}
