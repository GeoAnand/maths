<?php include('mathheader.php'); ?>
        <!-- Header Area End Here -->
        <!-- Inner Page Banner Area Start Here -->
        <div class="inner-page-banner-area" style="background-image: url('img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Research Areas</h1>
                   <!-- <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Research Areas</li>
                    </ul>-->
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Research Page 2 Area Start Here -->
        <div class="faq-page-area">
            <div class="container">
                <div class="row panel-group" id="faq-accordian">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php 
$sq11=mysqli_query($conn,"select * from researchs_math order by id ASC");
$x=0;
while($rq2=mysqli_fetch_array($sq11)) { 

//echo "select * from rese where title='".$rq2['id']."'";
$sq1=mysqli_query($conn,"select * from rese where title='".$rq2['id']."'");
if(mysqli_num_rows($sq1)>0){ 
$x++;

if($rq2['id']=='1'){
    $cls="active";
}else{
    $cls="";
}
$dd="";
while($rq=mysqli_fetch_array($sq1)) {
$lnk=$rq['lnk'];
$name=$rq['name'];
$dd.="<a href=$lnk target='_blank'>$name</a>, ";
}
$string = rtrim($dd,', ');
?>
<div class="faq-box-wrapper">
    <div class="faq-box-item panel panel-default">
        <div class="panel-heading active">
            <div class="panel-title faq-box-title">
                <h3>
                        <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $rq2['id']; ?>"><?php echo $rq2['title'];   ?>
                        </a>
                </h3>
            </div>
        </div>
        
        <div aria-expanded="false" id="collapseOne<?php echo $rq2['id']; ?>" role="tabpanel" class="panel-collapse collapse">
            <div class="panel-body faq-box-body">
            <p><?php echo $string; ?></p>
              <!--<p><a href="faculty-inner.php?fuid=65" target="_blank">Rajesh Narayanan</a>, <a href="faculty-inner.php?fuid=94" target="_blank">Ranjit Kumar Nanda</a>, <a href="faculty-inner.php?fuid=71" target="_blank">Shantanu Mukherjee</a>, <a href="faculty-inner.php?fuid=83" target="_blank"> Yasir Iqbal</a></p>-->
            </div>
        </div>
     </div>
</div>
<?php } } ?>  

                        
                        
                        
                        
                        
                        
                    </div>
                   
                </div>
            </div>
        </div>
        </div>
        <!-- Research Page 2 Area End Here -->
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
</body>



</html>
