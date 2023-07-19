<?php 
include("config.php");

//echo "select des from program where id='".$_GET['idd']."'";

$sqlBS=mysqli_query($conn,"select * from program where id='".$_GET['idd']."'");
$rw=mysqli_fetch_array($sqlBS);
$des=$rw['des'];
//echo $des;
?>

<div id="course_body">
    <h3><?php echo $rw['cno']; ?>&nbsp;&nbsp;<?php echo $rw['cname']; ?></h3>
<br>
<?php 
if($rw['des']!=''){
?>
<h4>Course Details</h4>
<p align="justify"></p><p align="justify"><?php echo $rw['des']; ?></p>
<?php } ?>
<!--<br><p></p>
<br>
<h4>Course References:</h4>
 <p align="justify">1. E. Kreyszig, Advanced Engineering Mathematics, 10th Ed., John Willey &amp; Sons, 2010.<br> 2. N. Piskunov, Differential and Integral Calculus Vol. 1-2, Mir Publishers, 1974.<br> 3. G. Strang,Calculus, Wellesley-Cambridge Press, 2010. <br> 4. J.E. Marsden, A.J. Tromba, A. Weinstein, Basic Multivariable Calculus, Springer Verlag, 1993.
<br>
</p>-->
</div>