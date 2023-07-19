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
                    <h1>Programs: Ph.D - Admissions</h1>
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

$sqlBj="select * from phdadmission";    
$sqlBSj=mysqli_query($conn,$sqlBj);

$rwj=mysqli_fetch_array($sqlBSj);
    
?>
		  
		 
          <div>
               <h3 style="color:#002147">Program Overview</h3>
                <p style="text-align:justify"><?php echo nl2br($rwj['po']); ?> </p>
               
           </div>
        
		  
		   <div>
               <h3 style="color:#002147">Structure of the Program

</h3>
                <p style="text-align:justify">
                   <?php echo nl2br($rwj['sp']); ?> </p>
               
           </div>
		   <?php 

$sj="select * from phdadmission";    
$sqj=mysqli_query($conn,$sj);

$rwr=mysqli_fetch_array($sqj);
    
?>     
		  
		   <div>
               <h3 style="color:#002147">More Information</h3>
                <p style="text-align:justify"><?php echo nl2br($rwr['note1']); ?> </p>
               
           </div>
           <br>
           <?php echo nl2br($rwr['note2']); ?>
           <br>
           <?php echo nl2br($rwr['note3']); ?>
           
           
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
