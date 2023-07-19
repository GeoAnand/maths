<?php 
include("config.php");

$rq1=mysqli_fetch_array(mysqli_query($conn,"select * from studdeg where id='".$_GET['deg']."'"));

?>
<div id="" style="overflow:auto;height:400px;">
    
<div>
<h4 class="modal-title" style="font-weight:bold">
<b id="program-title"><?php echo $rq1['sname']; ?></b> 
<span class="h4">( Semester</span>
<span id="syllabus-sem" class="h4"><?php echo $_GET['sem']; ?></span> 
<span class="h4">)</span> ----
<span id="syllabus-year" class="h4"><?php echo $_GET['yr']; ?></span>
</h4>
<br>
</div>
<?php
if(isset($_GET['yr']) && $_GET['yr']!=''){
$sqlB="select * from program where deg='".$_GET['deg']."' AND yr='".$_GET['yr']."' AND sem='".$_GET['sem']."' order by year DESC";    
}else{
$sqlB="select * from program where sem='".$_GET['sem']."' order by year DESC"; 
}
//echo $sqlB;
$sql=mysqli_query($conn,$sqlB);
while($rw=mysqli_fetch_array($sql)){
  $rq=mysqli_fetch_array(mysqli_query($conn,"select * from studdeg where id='".$_GET['deg']."'"));   
    
?>

	        	
	        	
<div id="course_body" style="">
    <h3><?php echo $rw['cno']; ?>&nbsp;&nbsp;<?php echo $rw['cname']; ?></h3>
<?php 
if($rw['des']!=''){
?>
<h4>Course Details</h4>
<p align="justify"></p><p align="justify"><?php echo $rw['des']; ?></p>
<?php } ?>
</div>
<?php } ?>

</div>