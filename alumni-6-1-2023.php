<?php include('mathheader.php'); ?>
        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Alumni</h1>
                  
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
       
            
        <style>
    .imgHt{
        width: 110px;
        height: 110px;
    }
</style>

     
 
                    
                    
    
            
                    <!-- Courses Page 2 Area Start Here -->
        <div class="courses-page-area2 lecturers-page1-area" style="background: #fff;">
            <div class="container" id="inner-isotope">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="isotop-classes-tab isotop-btn">
                    
<?php                  
$sq1=mysqli_query($conn,"select * from alumniyear order by alumniyear desc");
$x=0;
while($rq=mysqli_fetch_array($sq1)){
    if($_GET['year']==$rq['id']){
        $cld="current";
    }else{
        $cld="";
    }
?>
<a href="" data-filter=".fac" class="<?php echo $cld; ?>" onclick="selAlumni('<?php echo $rq['id']; ?>');"><?php echo $rq['alumniyear']; ?></a>
 <?php } ?>                    
<!--<a href="#" data-filter=".fac" class="current">2022</a>
<a href="#" data-filter=".dst">2023</a>
<a href="#" data-filter=".dis">2024</a>-->
                            <!--<a href="#" data-filter=".ad">2025</a>
                         
                            <a href="#" data-filter=".vis">2026</a>-->
                           <!-- <a href="#" data-filter=".medical">Medical</a>-->
                        </div>
                    </div>
                    
                </div>
<script>
    function selAlumni(a){
        document.location.href="alumni1.php?year="+a;
        
    }
</script>
                <div class="row featuredContainer">
       
       
       
<?php                  
$sq1=mysqli_query($conn,"select * from student_math order by dorder ASC");
while($rq=mysqli_fetch_array($sq1)){
if(isset($_GET['year']) && $_GET['year']!=''){
$sq2=mysqli_query($conn,"select * from alumni where deg='".$rq['id']."' AND year='".$_GET['year']."' order by id ASC");    
}

if(mysqli_num_rows($sq2)>0){
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fac">
<h4><?php echo $rq['sname']; ?></h4>
<section class="panel">    
<table class="table table-striped m-b-none text-lg">
<thead>
<tr class="dpt-text-dark">
  	<th style="width:80px;">S.No</th>
  	<th style="width:100px;">Roll No</th>    
  	<th style="width:200px;">Name</th> 
</tr>
</thead>
<tbody id="studentlistbyyear">
<?php
$x=0;
while($rq2=mysqli_fetch_array($sq2)){
$x++;
?>


		                  	              	
	                  		<tr>  
		                      <td><?php echo $x; ?></td>
		                      <td><?php echo $rq2['roll']; ?></td>
		                     <td><?php echo $rq2['name']; ?></td>
		                     
		                    </tr>
		                    
		                    
		                    
		                   
		           
		            
            
                    
     <?php 
}
?>

		                         		 </tbody>
		            </table>
		            
<br>
		              
		            
		            
		            
		    </section>
                    

		            
		            
	
                    </div>
<?php
}
}
?>
                 
                 
                  
           
                </div>
                
                <div class="row featuredContainer ">
                      
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dst" >
                    
                    
                        
                   
                    
                    </div>
                  
  
            
                   
                </div>
                
                <div class="row featuredContainer ">
                      
                    
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dis" style="margin: 0 0 25px 0;">
                    
                  
                    
                    </div>
 
                   
                </div>
               
                
                
               
                
                
            </div>
        </div>
        <!-- Courses Page 2 Area End Here -->
               
            
            
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
    <!-- Magic Popup js -->
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="js/main.js" type="text/javascript"></script>
</body>



</html>
