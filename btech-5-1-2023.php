<?php include("config.php"); 

$sqlh=mysqli_query($conn,"select MAX(yr)AS yr from student_math where deg='".$_GET['deg']."' ");
$rqh=mysqli_fetch_array($sqlh);
$yrd=$rqh['yr'];

?>
<?php include('mathheader.php'); ?>

    <style>
        
        
        
	#sticky-sidebar-demo{
			float: left;
			width: 200px;
			color: #ffbdbd;
			will-change: min-height;
		}

		#sticky-sidebar-demo .sidebar-box-inner{
		
			padding: 10px;
			position: relative;
			transform: translate(0, 0);
			transform: translate3d(0, 0, 0);
			will-change: position, transform;
		}
    </style>



        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    
                <?php
                $sq11=mysqli_query($conn,"select * from student_math where id='".$_GET['deg']."' ");
  $sq21=mysqli_fetch_array($sq11);
  
                
                ?>
                    
                    
                    <h1>Students : <?php echo $sq21['sname']; ?></h1>
                    <!--<ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Students</li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        
        <!-- Students Table Start here -->
        
                    <div class="container" id="contentContainer">
    
	<div class="col-sm-12 line line-solid" style="margin-top:30px"></div>
	
	


<div class="row">
    
   
		<div class="col-lg-12 col-md-12 col-sm-12" align="center">
		    
		    <div class="row">
		        
		        	<div class="col-sm-12" align="center" style="padding-bottom:30px">
			<div style="width:60%" align="right">
			 
			 <?php //echo  "select * from 	student where deg='".$_GET['deg']."'  group by yr ASC";  ?>
<select class="form-control" style="width: 20%;" id="changeyear" onchange="selStu();">
    
  <?php 
  $degree=$_GET['yr'];
  $sq1=mysqli_query($conn,"select * from student_math where id='".$_GET['deg']."' ");
  $sq2=mysqli_fetch_array($sq1);
  
  
  ?>
     <option value="">--Select--</option>
<?php

$sqc=mysqli_query($conn,"select * from 	student_math where deg='".$_GET['deg']."' group by yr DESC ");
while($roc=mysqli_fetch_array($sqc)) {
    if($roc['yr']==$_GET['yr']){
?>
<option value="<?php echo $roc['yr'];?>" selected ><?php echo $roc['yr'];?></option>
   <?php }else{ ?>
<option value="<?php echo $roc['yr'];?>"><?php echo $roc['yr'];?></option>
    <?php } } ?>
</select>
			</div>
		</div>
		        
		    </div>
		    
			<section class="panel" style="width:100%">
		            <header class="panel-heading"><?php echo $sq2['sname']; ?> - <?php echo $degree; ?></header> 
		            
		            
		            
		            <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                	<th>S.No</th>
		                  	<th>Name</th>
		                  	<th>Roll Number</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
		                  	              	
<?php 
//$sql=mysqli_query($conn,"select * from student where yr='".$_GET['yr']."' and deg='".$_GET['deg']."' order by (rollno+0), right(rollno, 3);");
$sqq="select * from student_math where yr='".$_GET['yr']."' and deg='".$_GET['deg']."' order by left(rollno, 3), right(rollno, 3);";
/*echo $sqq;
die();*/
$sql=mysqli_query($conn,$sqq);
$x=0;
while($row=mysqli_fetch_array($sql)){
    $x++;
?>	                  			                  			                  	<tr>                    
		                      <td>
		                     <?php echo $x; ?>
		                      </td>
		                      <td>
		                      	 <?php echo $row['sname']; ?>
		                      </td>
		                      <td>
		                     <?php echo $row['rollno']; ?>
	                      </td>
		                    </tr>
		                    <?php } ?>               		              </tbody>
		            </table>
		            
		           
		            
		           
		            
		            
		            
		            
		    </section>
		</div>






	</div>
		
      </div>
        
        <!-- Students Table End here -->
        
        <!-- Footer Area Start Here -->
        <?php include('footer.html'); ?>
        <!-- Footer Area End Here -->
    </div>
   
    <!-- jquery-->
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="js/wow.min.js"></script>
    <!-- Nivo slider js -->
    <script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="vendor/slider/home.js" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="js/jquery.meanmenu.min.js" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="js/jquery.scrollUp.min.js" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="js/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
    <!-- Select2 Js -->
    <script src="js/select2.min.js" type="text/javascript"></script>
    <!-- Nouislider Js -->
    <script src="vendor/noUiSlider/nouislider.min.js" type="text/javascript"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/sti.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    
		    
		      var winWidth = $( window ).width();
    if ( winWidth > 767 ) {
		    
			$('#sticky-sidebar-demo').stickySidebar({
				containerSelector: '.container',
				innerWrapperClass: 'sidebar-box-inner',
				topSpacing: 25
			});
			
			
    }
			
		});
		
		
	/*	$( document ).scroll( function () {
    var winWidth = $( window ).width();
    if ( winWidth < 767 ) {
        $( '#sticky-sidebar-demo' ).css( "position", "initial!important" );
    }
} );*/
	</script>

	
	<script type="text/javascript">
		var path="https://physics.iitm.ac.in/program/studentofyear";
		$("#changeyear").change(function(){
			$.post(path+'/'+$(this).val(),{'progid':3},function(){

			}).done(function(data){
				$("#studentlistbyyear").html(data);
			});
		});

function selStu(){
    	yr=$("#changeyear").val();
    document.location.href="btech.php?yr="+yr+"&deg="+<?php echo $_GET['deg']; ?>;
}
	</script>
</body>



</html>
