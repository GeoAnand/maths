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

        
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Programs: M.Sc</h1>
                    <!--<ul>
                        <li><a href="#">Home</a> -</li>
                        <li>M.Sc</li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        
        <!-- Students Table Start here -->
        
                    <div class="container" id="contentContainer">
    
	<div class="col-sm-12 line line-solid" style="margin-top:30px"></div>
	
	


<div class="row">
    
    

		<div class="col-lg-12 col-md-12 col-sm-12" >
		    
		  <?php 

$sqlBj="select * from programnewdes where deg='4' order by id ASC";    
$sqlBSj=mysqli_query($conn,$sqlBj);

$rwj=mysqli_fetch_array($sqlBSj);
    
?>
		  
		 
          <div>
               <h3 style="color:#002147">Program Overview</h3>
                <p style="text-align:justify"><?php echo nl2br($rwj['po']); ?> </p>
               
           </div>
        
		   <!-- <div>
               <h3 style="color:#002147">Selection Process
</h3>
                <p style="text-align:justify"><?php echo nl2br($rwj['process']); ?> </p>
               
           </div> -->
		  
		   <div>
               <h3 style="color:#002147">Structure of the Program

</h3>
                <p style="text-align:justify">
                   <?php echo nl2br($rwj['sp']); ?> </p>
               
           </div>
		  
		  
		  
		  
		  
		    
		    
		       <div class="gallery-area2">
            <div class="container" id="inner-isotope">
                
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0 0 15px 0;">
    <!--<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <label class="pull-left" style="width:100%;">Select a Batch</label>
    </div>-->
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
    <?php $sqlBS=mysqli_query($conn,"select * from programcat group by year order by year DESC"); ?>
   <!-- <select name="cyear" id="cyear" class="form-control select2" onchange="selyr();" required >
    <option value="">--Select--</option>
    <?php while($rowBS=mysqli_fetch_array($sqlBS)) { ?>
    <?php if($rowBS['year']==$_GET['yr']){ ?>
    <option value="<?php echo $rowBS['year'];?>" selected ><?php echo ucwords($rowBS['year']);?></option>
     <?php }else{ ?>
    <option value="<?php echo $rowBS['year'];?>"><?php echo ucwords($rowBS['year']);?></option>
    <?php } } ?>
    </select>-->
    <!--<select class="form-control inline" style="width: 20%;" id="changebatch" data-sem="8">
        	<option value="2020">2020</option>	
        	<option value="2019">2019</option>	
        	<option value="2018">2018</option>	
        	<option value="2017">2017</option>	
    </select>-->
    </div>	
</div>
					
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="isotop-classes-tab isotop-btn">
                          
                            <a href="#" data-filter=".sem1" class="current"> Semester 1</a>
                            <a href="#" data-filter=".sem2" >Semester 2</a>
                            <a href="#" data-filter=".sem3">Semester 3</a>
                            <a href="#" data-filter=".sem4">Semester 4</a>
                            
                        </div>
                    </div>
                </div>
                <div class="row featuredContainer gallery-wrapper">
                   
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sem1   ">
                         
		            <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnew where deg='4'  AND sem='1' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['cno']; ?></td>
<td><?php echo $rw['cname']; ?></td>
<td><?php echo $rw['credit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>
		            
		            
		            
	<?php 
	$sqlB2="select * from programnewwin where win='winter' AND deg='4' AND sem='1' order by id ASC";
	$sqlBS2=mysqli_query($conn,$sqlB2);
	$rw2=mysqli_fetch_array($sqlBS2);
	if($rw2['win']=='winter'){	            
		            
	?>	            
		   <br>
		   <h4>Winter</h4>
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewwin where win='winter' AND deg='4' AND sem='1' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['wcno']; ?></td>
<td><?php echo $rw['wcname']; ?></td>
<td><?php echo $rw['wcredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		        
		        	<?php 
	$sqlB3="select * from programnewsmr where win='summer' AND deg='4' AND sem='1' order by id ASC";
	$sqlBS3=mysqli_query($conn,$sqlB3);
	$rw3=mysqli_fetch_array($sqlBS3);
	if($rw3['smr']=='summer'){	            
		            
	?>	            
		   <br>
		   <h4>Summer</h4>          
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewsmr where win='summer' AND deg='4' AND sem='1' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['scno']; ?></td>
<td><?php echo $rw['scname']; ?></td>
<td><?php echo $rw['scredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		            
		            
		            
		            
		           
                    </div>
                    
                  
                   
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sem2   ">
                         
		            <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnew where deg='4'  AND sem='2' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['cno']; ?></td>
<td><?php echo $rw['cname']; ?></td>
<td><?php echo $rw['credit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>
		            
		            
		            
	<?php 
	$sqlB2="select * from programnewwin where win='winter' AND deg='4' AND sem='2' order by id ASC";
	$sqlBS2=mysqli_query($conn,$sqlB2);
	$rw2=mysqli_fetch_array($sqlBS2);
	if($rw2['win']=='winter'){	            
		            
	?>	            
		   <br>
		   <h4>Winter</h4>
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewwin where win='winter' AND deg='4' AND sem='2' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['wcno']; ?></td>
<td><?php echo $rw['wcname']; ?></td>
<td><?php echo $rw['wcredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		        
		        	<?php 
	$sqlB3="select * from programnewsmr where smr='summer' AND deg='4' AND sem='2' order by id ASC";
	$sqlBS3=mysqli_query($conn,$sqlB3);
	$rw3=mysqli_fetch_array($sqlBS3);
	if($rw3['smr']=='summer'){	            
		            
	?>	            
		   <br>
		   <h4>Summer</h4>          
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewsmr where smr='summer' AND deg='4' AND sem='2' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['scno']; ?></td>
<td><?php echo $rw['scname']; ?></td>
<td><?php echo $rw['scredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		            
		            
		            <br>
		            
		            
		           
		            
		           
                    </div>   
                  
                   
 
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sem3   ">
                         
		            <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnew where deg='4'  AND sem='3' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['cno']; ?></td>
<td><?php echo $rw['cname']; ?></td>
<td><?php echo $rw['credit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>
		            
		            
		            
	<?php 
	$sqlB2="select * from programnewwin where win='winter' AND deg='4' AND sem='3' order by id ASC";
	$sqlBS2=mysqli_query($conn,$sqlB2);
	$rw2=mysqli_fetch_array($sqlBS2);
	if($rw2['win']=='winter'){	            
		            
	?>	            
		   <br>
		   <h4>Winter</h4>
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewwin where win='winter' AND deg='4' AND sem='3' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['wcno']; ?></td>
<td><?php echo $rw['wcname']; ?></td>
<td><?php echo $rw['wcredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		        
		        	<?php 
	$sqlB3="select * from programnewsmr where smr='summer' AND deg='4' AND sem='3' order by id ASC";
	$sqlBS3=mysqli_query($conn,$sqlB3);
	$rw3=mysqli_fetch_array($sqlBS3);
	if($rw3['smr']=='summer'){	            
		            
	?>	            
		   <br>
		   <h4>Summer</h4>          
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewsmr where smr='summer' AND deg='4' AND sem='3' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['scno']; ?></td>
<td><?php echo $rw['scname']; ?></td>
<td><?php echo $rw['scredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		            
		            
		            <br>
		            
		         
		            
		           
                    </div>
                  
             
             
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sem4   ">
                         
		            <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnew where deg='4'  AND sem='4' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['cno']; ?></td>
<td><?php echo $rw['cname']; ?></td>
<td><?php echo $rw['credit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>
		            
		            
		            
	<?php 
	$sqlB2="select * from programnewwin where win='winter' AND deg='4' AND sem='4' order by id ASC";
	$sqlBS2=mysqli_query($conn,$sqlB2);
	$rw2=mysqli_fetch_array($sqlBS2);
	if($rw2['win']=='winter'){	            
		            
	?>	            
		   <br>
		   <h4>Winter</h4>
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewwin where win='winter' AND deg='4' AND sem='4' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['wcno']; ?></td>
<td><?php echo $rw['wcname']; ?></td>
<td><?php echo $rw['wcredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		        
		        	<?php 
	$sqlB3="select * from programnewsmr where smr='summer' AND deg='4' AND sem='4' order by id ASC";
	$sqlBS3=mysqli_query($conn,$sqlB3);
	$rw3=mysqli_fetch_array($sqlBS3);
	if($rw3['smr']=='summer'){	            
		            
	?>	            
		   <br>
		   <h4>Summer</h4>          
		            
		             <table class="table table-striped m-b-none text-lg">
		              <thead>
		                <tr class="dpt-text-dark">
		                    	<th>S No.</th>
		                	<th>Course No.</th>
		                  	<th>Course Name</th>
		                  	<th>Credits</th>                    
		                </tr>
		              </thead>
		              <tbody id="studentlistbyyear">
<?php 

$sqlB="select * from programnewsmr where smr='summer' AND deg='4' AND sem='4' order by id ASC";    
$sqlBS=mysqli_query($conn,$sqlB);
$x=0;
while($rw=mysqli_fetch_array($sqlBS)){
    $x++
?>

<tr> 
<td><?php echo $x; ?></td>
<td><?php echo $rw['scno']; ?></td>
<td><?php echo $rw['scname']; ?></td>
<td><?php echo $rw['scredit']; ?></td>
</tr>
<?php } ?>		          
		                    
		                    
		          </tbody>
		            </table>


		 <?php } ?>           
		            
		        
		        
		            
		            
		            <br>
		            
		            
		          
		            
		           
                    </div>
             
             
             
             
             
                    
                </div>
                
             <?php 

$sj="select * from programnewdes where deg='4' order by id ASC";    
$sqj=mysqli_query($conn,$sj);

$rwr=mysqli_fetch_array($sqj);
    
?>     
       
       
       
       <div>
           
           <?php echo nl2br($rwr['note1']); ?>
           <br>
           <?php echo nl2br($rwr['note2']); ?>
           <br>
           <?php echo nl2br($rwr['note3']); ?>
           
           
       </div>         
              
              
              <br>  
              <?php  if($rwr['syll']!='') { 
              ?>
              
                
                <a class="btn btn-info btn-lg" href="<?php echo $download_path; ?><?php echo $rwr['syll']; ?>" target="_blank">View Syllabus</a>  
                <?php } else {  ?>
                
                <a class="btn btn-info btn-lg" href="#" target="_blank">View Syllabus</a>
                
             <?php    } ?>
                
                
                
                <?php  if($rwr['cur']!='') { 
              ?>
                
		            <a class="btn btn-info btn-lg" href="<?php echo $download_path; ?><?php echo $rwr['cur']; ?>" target="_blank">View Curriculum</a> 
		            
		            <?php } else {  ?>
                
                <a class="btn btn-info btn-lg" href="#" target="_blank">View Syllabus</a>
                
             <?php    } ?>
                
		            
		           
                <?php  if($rwr['ele']!='') { 
              ?> 
		             <a class="btn btn-info btn-lg" href="<?php echo $download_path; ?><?php echo $rwr['ele']; ?>" target="_blank">View Electives</a>  
                
                 <?php } else {  ?>
                
                <a class="btn btn-info btn-lg" href="#" target="_blank">View Syllabus</a>
                
             <?php    } ?>
                
                
            </div>
        </div>
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		</div>






	</div>
		
      </div>
        
        <!-- Students Table End here -->
        
        <!-- Footer Area Start Here -->
       <?php include('footer.html'); ?>
        <!-- Footer Area End Here -->
    </div>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
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

function selyr(){
    cyear=$("#cyear").val();
    document.location.href="program-btech.php?yr="+cyear;
}
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
    document.location.href="program-btech.php?yr="+yr+"&deg="+<?php echo $_GET['deg']; ?>;
}


	</script>
</body>



</html>
